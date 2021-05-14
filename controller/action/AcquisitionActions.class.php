<?php

class AcquisitionActions extends Actions
{
    public static function executeYouTube()
    {
        return ['acquisition/youtube'];
    }

    /*
     * this is disabled, but kept around because users still access these URLs from emails
     *
     * it should be left as long as meaningful traffic exists to it in analytics
     */
    public static function executeYoutubeStatus(string $token)
    {
        return ['acquisition/youtube_status'];
    }
}
