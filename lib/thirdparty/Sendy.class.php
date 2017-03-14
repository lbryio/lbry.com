<?php

class SendyException extends Exception
{
}

class Sendy
{
  const STATUS_SUBSCRIBED   = 'Subscribed';
  const STATUS_UNSUBSCRIBED = 'Unsubscribed';
  const STATUS_UNCONFIRMED  = 'Unconfirmed';
  const STATUS_BOUNCED      = 'Bounced';
  const STATUS_SOFT_BOUNCED = 'Soft bounced';
  const STATUS_COMPLAINED   = 'Complained';

  const LIST_TEST = 'ko9LyWC4SQMI6763xTYCXucA';
  const LIST_GENERAL = '5Fax4vQ1c9lku763BKUNb4aQ';

  protected $installationUrl;
  protected $apiKey;
  protected $listId;

  public function __construct($apiKey, $installationUrl, $listId)
  {
    $this->apiKey          = $apiKey;
    $this->installationUrl = rtrim($installationUrl, '/');
    $this->listId          = $listId;
  }

  public static function getAllSubscriptionStatuses()
  {
    $r = new ReflectionClass(get_called_class());

    $constants = [];
    foreach ($r->getConstants() as $constant => $value)
    {
      if (preg_match('/^STATUS_/', $constant))
      {
        $constants[] = $value;
      }
    }

    return $constants;
  }

  public function subscribe($email, $name = null, array $extraVars = [])
  {
    $result = $this->call('subscribe', array_merge($extraVars, [
      'email'   => $email,
      'name'    => $name,
      'list'    => $this->listId,
      'boolean' => 'true',
    ]));

    switch ($result)
    {
      case '1':
        return true;

      case 'Already subscribed.':
        return 'Already subscribed.';

      default:
        throw new SendyException($result);
    }
  }

  public function unsubscribe($email)
  {
    $result = $this->call('subscribe', [
      'email'   => $email,
      'list'    => $this->listId,
      'boolean' => 'true',
    ]);

    if ($result == 1)
    {
      return true;
    }

    throw new SendyException($result);
  }

  public function getSubscriptionStatus($email)
  {
    $result = $this->callAuth('api/subscribers/subscription-status.php', ['email' => $email, 'list_id' => $this->listId]);

    if (in_array($result, static::getAllSubscriptionStatuses()))
    {
      return $result;
    }

    throw new SendyException($result);
  }

  public function getActiveSubscriberCount()
  {
    $result = $this->callAuth('api/subscribers/active-subscriber-count.php', ['list_id' => $this->listId]);

    if (!is_numeric($result))
    {
      throw new SendyException($result);
    }

    return (int)$result;
  }

  public function createCampaign(array $values)
  {
    $result = $this->callAuth('api/campaigns/create.php', $values);

    switch ($result)
    {
      case 'Campaign created':
      case 'Campaign created and now sending':
        return $result;

      default:
        throw new SendyException($result);
    }
  }

  protected function call($endpoint, array $values = [])
  {
    return Curl::post($this->installationUrl . '/' . $endpoint, $values);
  }

  protected function callAuth($endpoint, array $values = [])
  {
    return $this->call($endpoint, array_merge($values, ['api_key' => $this->apiKey]));
  }
}
