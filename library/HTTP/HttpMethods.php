<?php

namespace Library\HTTP;

use Symfony\Component\HttpClient\HttpClient;
use Library\Utils\ApiKey;
use Library\Utils\Parser;
use Symfony\Component\Yaml\Yaml;

class HttpMethods
{
    const BASE_URL = "https://api.notion.com/";
    const API_VERSION = "v1";

    private $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }


    public function get(string $context, string $id)
    {
        $yaml = new Yaml();
        $parser = new Parser($yaml);
        
        $response = $this->client->request('GET', self::BASE_URL . self::API_VERSION . "/" . $context . "/" . $id, [
            'headers' => [
                'Authorization' => 'Bearer ' . ApiKey::getApiKey($parser),
                'Notion-Version' => '2021-08-16'
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return $response->toArray();
        } else {
            return false;
        }

    }
    

    public function post(string $context, string $id, array $data)
    {
        $client = HttpClient::create();
        $response = $client->request('POST', self::BASE_URL . self::API_VERSION . '/' . $context . '/' . $id , [
            'body' => $data
        ]);
        return $response;
    }

    public static function patch(string $id, array $data)
    {
        $client = HttpClient::create();
        $response = $client->request('PATCH', self::BASE_URL . self::API_VERSION . '/' . $id , [
            'body' => $data
        ]);
        return $response;
    }

    public function delete(array $data, string $id)
    {
        $client = HttpClient::create();
        $response = $client->request('DELETE', self::BASE_URL . self::API_VERSION . '/' . 'blocks' . '/' . $id , [
            'body' => $data
        ]);
        return $response;
    }
}
