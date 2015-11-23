<?php

/**
 * i18n dummy we'll be happy to have later
 */
function __($msg, $args = [])
{
  return strtr($msg, $args);
}

/**
 * Description of i18n
 *
 * @author jeremy
 */
class i18n
{
  public static function register() /*needed to trigger class include, presumably setup would happen here*/
  {
    setlocale(LC_MONETARY, 'en_US.UTF-8');
  }

  public static function formatCurrency($amount, $currency = 'USD')
  {
    return '<span class="formatted-currency">' . money_format('%.2n', $amount) . '</span>';
  }

  public static function formatCredits($amount)
  {
    return '<span class="formatted-credits">' .  number_format($amount, 1) . ' LBC</span>';
  }
}
