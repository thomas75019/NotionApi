<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Library\Utils\ApiKey;
use Library\utils\Parser;
use Symfony\Component\Yaml\Yaml;
class ApiKeyTest extends TestCase
{
    public function testGetApiKey()
    {

        $yaml = new Yaml();

        $parser = new Parser($yaml);
        
        $this->assertIsString(ApiKey::getApiKey($parser));

    }

}