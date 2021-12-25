<?php

namespace Library\utils; 

use Symfony\Component\Yaml\Yaml;

class Parser {
    /**
     * Parsed file
     * 
     * @var [mixed]
     */
    private $parsedFile;

    /**
     * Parse stetting file 
     *
     * @param Yaml $parser
     * @return void
     */
    private function parseYaml(Yaml $parser) {
        $this->parsedFile = $parser::parseFile('../settings.yaml');

        return $this;
    }

}