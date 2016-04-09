<?php

/**
 * Description of CreditApi
 *
 * @author jeremy
 */
class CreditApi
{
  public static function getCurrentTestCreditReward()
  {
    return 1000;
  }
  
  public static function getTotalDollarSales()
  {
    return 22585;
  }

  public static function getTotalPeople()
  {
    $rawJSON = file_get_contents('https://spreadsheets.google.com/feeds/cells/1iOC1o5jq_4ySwRzsy2tZPPltw6Tbky2e3lDFdsWV8dU/okf1n52/public/full/R1C1?alt=json');
    $json = $rawJSON ? json_decode($rawJSON, true) : [];
    return isset($json['entry']) && isset($json['entry']['content']) && is_numeric($json['entry']['content']['$t'] ) ?
              $json['entry']['content']['$t'] :
              6687; //fallback #
  }

  public static function getCreditsPerDollar($days)
  {
    //naive algo = decrease 0.5% per day
    return 200 * max(0, 100 - $days / 2) / 100;
  }
}
