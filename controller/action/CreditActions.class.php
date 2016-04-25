<?php

/**
 * Description of CreditActions
 *
 * @author jeremy
 */
class CreditActions extends Actions
{
  public static function executeFund()
  {
    $fundStartTime = strtotime('2015-11-15');
    $daysActive = floor((time() - $fundStartTime) / (60*60*24));
    return ['fund/fund', [
        'creditsPerDollar' => CreditApi::getCreditsPerDollar($daysActive),
        'creditsPerDollarTomorrow' => CreditApi::getCreditsPerDollar($daysActive + 1),
    ]];
  }
}