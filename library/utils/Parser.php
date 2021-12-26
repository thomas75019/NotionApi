<?php

namespace Library\utils; 

use Symfony\Component\Yaml\Yaml;


class Parser {
    
    private $parser;

    public function __construct(Yaml $yaml)
    {
        $this->parser = $yaml;
    }

    /**
     * Parse the file, avoid the static use on main function for better testing
     *
     * @param [string] $filePath
     * @return array
     */
    private function parsing(string $filePath): array
    {
        return $this->parser::parseFile($filePath);
    }

    /**
     * Return the settings array
     *
     * @return mixed
     */
    public function parseYaml() : array
    {

        return $this->parsing('./settings.yaml');
    }

    
    /**
     * Transform Json Data to an array
     *
     * @param [Json] $json
     * @return array 
     */
    public function parseJson($json) : array
    {
        if ($this->isJson($json)) {
            return json_decode($json, true);
        }
        throw new \Exception("The data is not a valid json");
    }

    private function isJson($string) : bool
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}