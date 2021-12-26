<?php

use Library\utils\Parser;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

final class ParserTest extends TestCase
{
   
    
    public function testParseYaml()
    {
        $yaml = new Yaml();
    
        $parser = new Parser($yaml);
        $this->assertTrue(is_array($parser->parseYaml()));

    }

    public function testParseJson() 
    {
        $yaml = new Yaml();
    
        $parser = new Parser($yaml);
        $this->assertTrue(is_array($parser->parseJson(json_encode(["test" => "test"]))));

    }


    public function testErrorParseJson() 
    {
        $yaml = new Yaml();
    
        $parser = new Parser($yaml);
        $this->expectExceptionMessage("The data is not a valid json");
        $parser->parseJson("test");

    }   



}