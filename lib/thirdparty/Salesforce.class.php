<?php

class Salesforce
{
    const
    API_URL = 'https://api.salesforceiq.com/v2/',
    DEFAULT_LIST_ID = '58387a94e4b0a1fea2c76f4a';

    protected static $curlOptions = [
      'headers' => ['Accept: application/json', 'Content-type: application/json'],
      'json_response' => true,
      'json_data' => true,
      'timeout' => 10
    ];

    public static function createContact(string $email, string $initialListId = null, string $acquisitionChannel = null)
    {
        $contactData = [
      'properties' => [
        'email' => [[
          'value' => $email,
          'metadata' => ['primary' => true]
        ]]
      ]
    ];

        $contactId = static::post('contacts?_upsert=email', $contactData)['id'] ?? null;

        if ($initialListId) {
            if (!$contactId) {
                throw new SalesforceException('Failed to generate or update contact');
            }

            static::post('lists/' . $initialListId . '/listitems?_upsert=contactIds', [
        'contactIds' => [$contactId],
        'fieldValues' => (object)[
          '2' => [['raw' => $acquisitionChannel]]
        ]
      ]);
        }
    }

    protected static function getApiUserPassword()
    {
        $userpw = Config::get(Config::SALESFORCE_KEY) . ':' . Config::get(Config::SALESFORCE_SECRET);
        if ($userpw[0] === ':' || substr($userpw, -1) === ':') {
            throw new SalesforceException('Salesforce key and/or secret not configured correctly');
        }
        return $userpw;
    }

    public static function get($endpoint, array $data = [])
    {
        $options = [
        'password' => static::getApiUserPassword(),
     ] + static::$curlOptions;

        $responseData = Curl::get(static::API_URL . $endpoint, $data, $options);

        return $responseData ?? [];
    }

    public static function post($endpoint, array $data = [], array $options = [])
    {
        $options += [
       'password' => static::getApiUserPassword(),
     ] + static::$curlOptions;

        $responseData = Curl::post(static::API_URL . $endpoint, $data, $options);
        return $responseData ?? [];
    }
}

class SalesforceException extends Exception
{
}
