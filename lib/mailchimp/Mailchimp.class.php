<?php

class Mailchimp extends MCAPI
{
  const LIST_GENERAL_ID = '7b74c90030';
  
  protected static $instance = null;

  public function __construct($key = null)
  {
    if ($key === null)
    {
      $key = trim(file_get_contents($_SERVER['ROOT_DIR'] . '/data/secret/mailchimp-api-key'));
    }
    return parent::__construct($key);
  }
//
//  public function listBatchSubscribeUsers($listId, $persons, Site $site)
//  {
//    $batch = [];
//    foreach($persons as $person)
//    {
//      $row = $site->isAdmin() ? $this->getMailchimpRowDataAdminSite($person) : $this->getMailchimpRowData($person, $site);
//      if ($row)
//      {
//        $batch[] = $row;
//      }
//    }
//    return $this->listBatchSubscribe($listId, $batch, false, true, false);
//  }
//
//  protected function getMailchimpRowData($person, $site)
//  {
//    return [
//        'EMAIL' => $person['email_address'],
//        'FNAME' => $person['first_name'],
//        'LNAME' => $person['last_name'],
//        'GENDER' => $person['gender'],
//        'USER_ID' => $person['id'],
//        'USER_CULTURE' => $person['culture']
//    ];
//  }
//
//  protected function getMailchimpRowDataAdminSite($person)
//  {
//    if (!preg_match('/@(' . implode('|', SiteDomainTable::getAllServiceDomainNames()) . ')$/', $person['email_address'])) //don't add @network addresses
//    {
//      $site = SiteTable::guessMostUsedSiteForPersonId($person['id']);
//      if (!$site)
//      {
//        return null;
//      }
//      $organization = null;
//      if ($site->isMultiOrganization())
//      {
//        $organization = OrganizationTable::guessForNetworkSiteIdAndPersonId($site, $person['id']);
//      }
//      if (!$organization)
//      {
//        $organization = $site->Organization;
//      }
//      return $this->getMailchimpRowData($person, $site) + [
//        'ORG_FULL' => $organization->full_name,
//        'ABBR' => $organization->abbr,
//        'SITE_NAME' => $site->name,
//        'IS_ADMIN' => isset($site['is_admin']) && $site['is_admin'] ? 'Yes' : 'No',
//        'URL' => $site->getPrimaryDomain()->getName(),
//        'STATUS' => $site->is_public ? 'Public' : 'Private',
//        'SERVICE' => $site->Service->name,
//        'CULTURE' => $organization->culture,
//        'USES_PAYMENTS' => PaymentServiceTable::count(['organization_id' => $organization['id'], 'is_enabled' => 1, 'type' => PaymentService::TYPE_TOPSCORE]) ? 'Yes' : 'No'
//      ];
//    }
//    return false;
//  }
}
