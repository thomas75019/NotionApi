<?php declare(strict_types=1);

use Library\HTTP\HttpMethods;
use PHPUnit\Framework\TestCase;
use Library\Database\Database;
use Library\Interfaces\ParentInterface;
use Library\Interfaces\PropertiesObjectInterface;


final class DatabasesMethodTest extends TestCase
{
    protected HttpMethods $httpMethods;

    protected function setUp(): void
    {
        $this->httpMethods = $this->createMock(HttpMethods::class);
        $this->databaseClass = new Database();
        $this->database = $this->createMock(Database::class);

    }

    public function testRetrieveDatabase(): void
    {
        
        $this->database->method('retrieveDatabase')->willReturn(['test']);

        $this->assertTrue(is_array($this->database->retrieveDatabase('test')));
    }

    public function testGetDatabaseBadRequest()
    {

        $this->database->method('retrieveDatabase')->willReturn('Bad request');
        $this->assertEquals($this->database->retrieveDatabase('test'), 'Bad request');
    }

    public function testCreateDatabase(): void
    {
        $parent = $this->createMock(ParentInterface::class);
        $properties = $this->createMock(PropertiesObjectInterface::class);


        $this->database->method('createDatabase')->willReturn('test');

        $this->assertIsString($this->database->createDatabase($parent, $properties));
    }

    public function testFailCreateDatabase()
    {
        $parent = $this->createMock(ParentInterface::class);
        $properties = $this->createMock(PropertiesObjectInterface::class);


        $this->database->method('createDatabase')->willReturn(new Exception());

        $this->assertInstanceof( Exception::class , $this->database->createDatabase($parent, $properties));
        
    }


}