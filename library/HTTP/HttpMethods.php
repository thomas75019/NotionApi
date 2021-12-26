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


    public static function get(string $context, string $id = null)
    {
        $yaml = new Yaml();
        $parser = new Parser($yaml);
        $client = HttpClient::create();
        $response = $client->request('GET', self::BASE_URL . self::API_VERSION . "/" . $context . "/" . $id, [
            'headers' => [
                'Authorization' => 'Bearer ' . ApiKey::getApiKey($parser->parseYaml()),
                'Notion-Version' => '2021-08-16'
            ]
        ]);

        return $response->toArray();
    }
    

    public static function post(string $context, string $id, array $data)
    {
        $client = HttpClient::create();
        $response = $client->request('POST', self::BASE_URL . self::API_VERSION . '/' . $context . '/' . $id , [
            'body' => $data
        ]);
        return $response->getContent();
    }

    public static function patch(string $url, array $data)
    {
        $client = HttpClient::create();
        $response = $client->request('PATCH', $url, [
            'body' => $data
        ]);
        return $response->getContent();
    }
}
