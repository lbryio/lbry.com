<?php

class AcquisitionActions extends Actions
{
    public static function executeFollowCampaign(string $claimName)
    {
        $claim = ChainQuery::findChannelClaim($claimName);

        if (!$claim || !$claim['source_url']) {
            Controller::redirect('/');
        }

        $title = $claim['title'] ?: $claim['name'];
        $coverUrl = $claim['source_url'];
        return ['acquisition/follow_campaign', [
            'claim' => $claim,
            'claimCount' => ChainQuery::countClaimsInChannel($claim['claim_id']),
            'title' => $title,
            'coverUrl' => $coverUrl,
        ]];
    }

    public static function executeYouTube(string $version = '')
    {
        $errorMessage = Request::getParam('error_message', '');

        if (Session::getFlash(Session::KEY_YOUTUBE_SYNC_ERROR)) {
            $errorMessage = Session::getFlash(Session::KEY_YOUTUBE_SYNC_ERROR);
        }

        return ['acquisition/youtube', [
            'reward' => LBRY::youtubeReward(),
            'error_message' =>  $errorMessage
        ]];
    }

    public static function executeVerify(string $token)
    {
        return ['acquisition/verify', ['token' => $token]];
    }

    public static function executeAutoVerify()
    {
        return ['acquisition/auto-verify'];
    }

    public static function executeYoutubeToken()
    {
        $channelName = Request::encodeStringFromUser($_POST['desired_lbry_channel_name']);
        $immediateSync = (boolean)$_POST['immediate_sync'];

        if ($channelName && $channelName[0] !== "@") {
            $channelName = '@' . $channelName;
        }

        $token = LBRY::connectYoutube($channelName, $immediateSync);

        if ($token['success'] && $token['data']) {
            Controller::redirect($token['data']);
        } else {
            Session::setFlash(Session::KEY_YOUTUBE_SYNC_ERROR, $token['error'] ?? "An unknown error occured.");
            Controller::redirect('/youtube');
        }
    }

    public static function executeYoutubeStatus(string $token)
    {
        $data = LBRY::statusYoutube($token);

        if (!$data['success']) {
            Session::setFlash(Session::KEY_YOUTUBE_SYNC_ERROR, $data['error'] ?? "Error fetching your sync status.");
            Controller::redirect('/youtube');
        }

        return ['acquisition/youtube_status', [
            'token' => $token,
            'status_token' => $data,
            'error_message' => Session::getFlash(Session::KEY_YOUTUBE_SYNC_ERROR)
        ]];
    }

    public static function actionYoutubeEdit($status_token, $channel_name, $email, $sync_consent)
    {
        $current_value = LBRY::statusYoutube($status_token);
        if ($current_value['data']['email'] == $email) {
            $status = LBRY::editYoutube($status_token, $channel_name, null, $sync_consent);
        } else {
            $status = LBRY::editYoutube($status_token, $channel_name, $email, $sync_consent);
        }

        if ($status['success'] == false) {
            Session::setFlash(Session::KEY_YOUTUBE_SYNC_ERROR, $status['error']);
            Controller::redirect("/youtube/status/". $status_token);
        } else {
            Controller::redirect("/youtube/status/" . $status_token);
        }
    }

    public static function executeYoutubeEdit()
    {
        return ['acquisition/youtube_edit'];
    }

    public static function executeRedirectYoutube()
    {
        return ['acquisition/youtube_status_redirect'];
    }
}
