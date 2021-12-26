<?php declare(strict_types=1);

use Library\HTTP\HttpMethods;
use PHPUnit\Framework\TestCase;
use Library\Database\Database;
final class DatabasesMethodTest extends TestCase
{
    protected HttpMethods $httpMethods;

    protected function setUp(): void
    {
        $this->httpMethods = $this->createMock(HttpMethods::class);
        $this->database = new Database();

    }

    public function testGetDatabase(): void
    {
        $database = $this->createMock(Database::class);

        $database->expects($this->once())->method('getDatabase')->willReturn(['test']);

        $this->assertTrue(is_array($database->getDatabase(1)));
    }

    public function testGetDatabaseBadRequest()
    {
        $this->assertEquals($this->database->getDatabase('test'), 'Bad request');
    }

    

}