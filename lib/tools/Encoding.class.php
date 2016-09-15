<?php

class Encoding
{
  public static function base64EncodeUrlsafe($data)
  {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); // equals sign is just for padding, can be safely removed
  }

  public static function base64DecodeUrlsafe($data)
  {
    return base64_decode(strtr($data, '-_', '+/')); // dont worry about replacing equals sign
  }
}