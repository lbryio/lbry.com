<?php

/**
 * Shell
 *
 * Execute shell commands properly.
 * - forks a separate process to run the command
 * - collects all output (including the exit code and stderr) and returns it neatly
 * - optionally prints the output/error to stdout/stderr, so you can see it in (almost) real time
 *
 * @author Alex Grintsvayg
 * @link https://gist.github.com/lyoshenka/4a861672cf36ece4d09c
 *
 */
class Shell
{
    /**
     * Execute a command. Returns the command's exit code, output, and error output.
     *
     * @param string $cmd      The command to execute
     * @param array  $options  Available options:
     *                         - echo (bool) - If true, print the command's output/error to stdout/stderr of this process
     *                         - echo_errors (bool) - If you want to control printing to stderr separately, use this. If not provided, will
     *                         default to the value of 'echo'
     *                         - live_callback (callable) - Will be called as soon as data is read. Use this for custom handling
     *                         of live output. Callable signature: fn(string $text, bool $isError)
     *
     * @return array [exit code, output, errorOutput]
     */
    public static function exec($cmd, array $options = [])
    {
        $options = array_merge([
      'echo'          => false,
      'echo_errors'   => null,
      'live_callback' => null,
    ], $options);

        if ($options['echo_errors'] === null) {
            $options['echo_errors'] = $options['echo'];
        }

        if ($options['live_callback'] && !is_callable($options['live_callback'])) {
            throw new InvalidArgumentException('live_callback option must be a valid callback');
        }

        $descriptorSpec = [
      1 => ['pipe', 'w'], // stdout
      2 => ['pipe', 'w'], // stderr
    ];

        $process = proc_open($cmd, $descriptorSpec, $pipes);
        if (!is_resource($process)) {
            throw new RuntimeException('proc_open failed');
        }

        stream_set_blocking($pipes[1], false);
        stream_set_blocking($pipes[2], false);

        $output = '';
        $err    = '';

        while (!feof($pipes[1]) || !feof($pipes[2])) {
            foreach ($pipes as $key => $pipe) {
                $data = fread($pipe, 1024);
                if (!$data) {
                    continue;
                }

                if (1 == $key) {
                    $output .= $data;
                    if ($options['echo']) {
                        fprintf(STDOUT, "%s", $data);
                    }
                    if ($options['live_callback']) {
                        call_user_func($options['live_callback'], $data, false);
                    }
                } else {
                    $err .= $data;
                    if ($options['echo_errors']) {
                        fprintf(STDERR, "%s", $data);
                    }
                    if ($options['live_callback']) {
                        call_user_func($options['live_callback'], $data, true);
                    }
                }
            }

            usleep(100000);
        }

        fclose($pipes[1]);
        fclose($pipes[2]);

        $exitCode = proc_close($process);

        return [$exitCode, $output, $err];
    }

    /**
     * Convenience method to build a command to execute. Will escape everything as necessary.
     *
     * @param string $executable The path to the executable
     * @param array  $arguments  An array of arguments
     * @param array  $options    An associative array of flags in the form flagName => flagValue.
     *                           Short and long flags are supported.
     *                           If flagValue === true, the flag have no value.
     *                           If flagValue === false, the flag will be skipped.
     *
     * @return string An executable command
     */
    public static function buildCmd($executable, array $arguments = [], array $options = [])
    {
        $shellArgs = [];

        foreach ($options as $key => $value) {
            if ($value === false) {
                continue;
            }

            if (strlen($key) === 1) {
                $shellArgs[] = '-'.$key;
                if ($value !== true) {
                    $shellArgs[] = $value;
                }
            } else {
                $shellArgs[] = '--' . $key . ($value !== true ? '=' . $value : '');
            }
        }

        $shellArgs = array_merge($shellArgs, array_values($arguments));

        return $executable . ' ' . join(' ', array_map('escapeshellarg', $shellArgs));
    }
}
