<?php

/**
 * Very basic wrapper since replacing $_SESSION might happen at scale + convenience methods
 *
 * @author jeremy
 */
class Session
{
  const KEY_MAILCHIMP_LIST_IDS = 'mailchimp_list_ids',
        KEY_DOWNLOAD_ACCESS_ERROR = 'download_error',
        KEY_DOWNLOAD_REFERRAL_CODE = 'beta_referral_code',
        KEY_DOWNLOAD_ALLOWED = 'beta_download_allowed',
        KEY_LIST_SUB_ERROR = 'list_error',
        KEY_LIST_SUB_SIGNATURE = 'list_sub_sig',
        KEY_LIST_SUB_SUCCESS = 'list_success',
        KEY_LIST_SUB_FB_EVENT = 'list_sub_fb_event';

  public static function init()
  {
    session_start();
  }

  public static function get($key, $default = null)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function unsetKey($key)
  {
    unset($_SESSION[$key]);
  }
}
