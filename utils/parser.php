<?php

namespace Library\utils; 

use Symfony\Component\Yaml\Yaml;

class Parser {
    
    private $parser;

    private function __construct(Yaml $yaml)
    {
        $this->parser = $yaml;
    }

    /**
     * Parse stetting file 
     *
     * @param Yaml $parser
     * @return mixed
     */
    public function parseYaml() {
        $parsedFile = $this->parser::parseFile('../settings.yaml');

        return $parsedFile;
    }

}