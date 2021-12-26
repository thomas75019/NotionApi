<?php declare(strict_types=1);

use Library\HTTP\HttpMethods;
use PHPUnit\Framework\TestCase;
use Library\Utils\ApiKey;
use Library\utils\Parser;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;


final class HttpMethodsTest extends TestCase 
{
    protected $client;
    protected $response;

    protected function setUp(): void
    {
        $this->client = $this->getMockBuilder(HttpMethods::class)->getMock();
        $this->response = $this->getMockBuilder(ResponseInterface::class)->getMock();
    }

    public function testGetBadRequest()
    {
        $yaml = new Yaml();
        $parser = new Parser($yaml);
       $this->client = HttpClient::create();
        $apiKey = ApiKey::getApiKey($parser);
        $this->response =$this->client->request('GET', 'https://api.notion.com/v1/collection/5e8f8f8f-f8f8-f8f8-f8f8-f8f8f8f8f8f8', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Notion-Version' => '2021-08-16'
            ]
        ]);
        $this->assertTrue($this->response->getStatusCode() == 400);
    }

    public function testGet()
    {
        
        $this->response->expects($this->once())->method('getStatusCode')->willReturn(200);
        $this->client->expects($this->once())->method('get')->willReturn($this->response);
        $this->client->get('test');
    
        $this->assertInstanceOf(ResponseInterface::class, $this->response);
        $this->assertEquals(200, $this->response->getStatusCode());

    }

    public function testDelete()
    {       
        $this->response->expects($this->once())->method('getStatusCode')->willReturn(200);
        $this->client->expects($this->once())->method('delete')->willReturn($this->response);
        $this->client->delete([], 'test');    
        $this->assertInstanceOf(ResponseInterface::class, $this->response);
        $this->assertEquals(200, $this->response->getStatusCode());

    }

    public function testDeleteBadRequest()
    {
        $this->response->expects($this->once())->method('getStatusCode')->willReturn(400);
        $this->client->expects($this->once())->method('delete')->willReturn($this->response);
        $this->client->delete([], 'test');
        
        $this->assertInstanceOf(ResponseInterface::class, $this->response);
        $this->assertEquals(400, $this->response->getStatusCode());
    }
    
}