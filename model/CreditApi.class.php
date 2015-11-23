<?php

/**
 * Description of CreditApi
 *
 * @author jeremy
 */
class CreditApi
{
  public static function getTotalDollarSales()
  {
    return 22585;
  }

  public static function getTotalPeople()
  {
    return 573;
  }

  public static function getCreditsPerDollar($days)
  {
    //naive algo = decrease 0.5% per day
    return 200 * max(0, 100 - $days / 2) / 100;
  }
}
