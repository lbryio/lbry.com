<?php

/**
 * Description of ContentActions
 *
 * @author jeremy
 */
class ContentActions extends Actions
{
  public static function executeHome()
  {
    return ['page/home', [
      'totalUSD' => CreditApi::getTotalDollarSales(),
      'totalPeople' => CreditApi::getTotalPeople()
    ]];
  }
}
