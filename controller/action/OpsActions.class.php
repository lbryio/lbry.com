<?php

class OpsActions extends Actions
{
    public static function executeClearCache(): array
    {
        if (!ini_get('apc.enabled') || !function_exists('apc_clear_cache')) {
            return View::renderJson(['success' => false, 'error' => 'Cache not enabled']);
        }

        apc_clear_cache();
        apc_clear_cache('user');
        apc_clear_cache('opcode');

        return View::renderJson(['success' => true]);
    }

    public static function executePostCommit(): array
    {
        $payload = Request::getParam('payload');
        if (!$payload) {
            return NavActions::execute400(['error' => 'No payload']);
        }

        $payload = json_decode($payload, true);
        if ($payload['ref'] === 'refs/heads/master') {
            $sig = Request::getHttpHeader('X-Hub-Signature');
            if (!$sig) {
                return NavActions::execute400(['error' => "HTTP header 'X-Hub-Signature' is missing."]);
            }

            list($algo, $hash) = explode('=', Request::getHttpHeader('X-Hub-Signature'), 2) + ['', ''];
            if (!in_array($algo, hash_algos(), true)) {
                return NavActions::execute400(['error' => 'Invalid hash algorithm "' . htmlspecialchars($algo) . '"']);
            }

            $rawPost = file_get_contents('php://input');
            $secret  = Config::get(Config::GITHUB_KEY);
            if ($hash !== hash_hmac($algo, $rawPost, $secret)) {
                return NavActions::execute400(['error' => 'Hash does not match.']);
            }

            file_put_contents(ROOT_DIR . '/data/writeable/NEEDS_UPDATE', '');
        }

        return [null, []];
    }

    public static function executeLogUpload(): array
    {
        $log = Request::getPostParam('log') ? urldecode(Request::getPostParam('log')) : null;
        if (Request::getPostParam('name')) {
            $name = substr(trim(urldecode(Request::getPostParam('name'))), 0, 50);
        } elseif (Request::getPostParam('date')) {
            $name = substr(trim(urldecode(Request::getPostParam('date'))), 0, 20) . '_' .
              substr(trim(urldecode(Request::getPostParam('hash'))), 0, 20) . '_' .
              substr(trim(urldecode(Request::getPostParam('sys'))), 0, 50) . '_' .
              substr(trim(urldecode(Request::getPostParam('type'))), 0, 20);
        } else {
            $name = null;
        }

        $name = preg_replace('/[^A-Za-z0-9_-]+/', '', $name);

        if (!$log || !$name) {
            return NavActions::execute400(['error' => "Required params: log, name"]);
        }

        $awsKey    = Config::get(Config::AWS_LOG_ACCESS_KEY);
        $awsSecret = Config::get(Config::AWS_LOG_SECRET_KEY);

        if (!$log || !$name) {
            throw new RuntimeException('Missing AWS credentials');
        }

        $tmpFile = tempnam(sys_get_temp_dir(), 'lbryinstalllog');
        file_put_contents($tmpFile, $log);

        if (filesize($tmpFile) > 1024 * 1024 * 2) {
            return NavActions::execute400(['error' => 'Log file is too large']);
        }

        S3::$useExceptions = true;
        S3::setAuth($awsKey, $awsSecret);
        S3::putObject(S3::inputFile($tmpFile, false), 'lbry-install-logs', $name);
        unlink($tmpFile);

        return [null, []];
    }
}
