<?php

namespace Library\Utils;

use Library\utils\Parser;


class ApiKey {
     
    /**
     * Get Notion Api Key
     *
     * @param Parser $parser
     * @return string
     */
    public static function getApiKey(Parser $parser) {
        $apiKey = $parser->parseYaml();

        return $apiKey['notion_api_key'];
    }
}

