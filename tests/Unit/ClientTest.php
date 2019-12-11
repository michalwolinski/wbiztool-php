<?php


namespace Tests\Unit;


use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Haxmedia\WbizTool\Client;
use Haxmedia\WbizTool\Dto\Credentials;
use Haxmedia\WbizTool\Dto\Receiver;
use Haxmedia\WbizTool\Exception\WbizToolException;
use Haxmedia\WbizTool\MessageType\Text;
use Haxmedia\WbizTool\Method\SendMessage;
use Tests\TestCase;

/**
 * Class ClientTest
 * @package Tests\Unit
 */
class ClientTest extends TestCase
{

    /**
     * @var Client
     */
    private Client $client;
    /**
     * @var Receiver
     */
    private Receiver $receiver;
    /**
     * @var array
     */
    private array $response;

    /**
     *
     */
    protected function setUp(): void
    {
        $credentials = new Credentials(123, 'abc123', 123);

        $this->response = [
            'status'  => 1,
            'message' => 'Created',
            'msg_id'  => 12345
        ];

        $mock = new MockHandler([
            new Response(200, [], json_encode($this->response))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $guzzle       = new GuzzleClient(['handler' => $handlerStack]);

        $this->client   = new Client($guzzle, $credentials);
        $this->receiver = new Receiver('48123456789');
    }

    /** @test
     * @throws WbizToolException
     */
    public function it_pushes_message()
    {
        $message = new Text('Test message');
        $method  = new SendMessage();

        $response = $this->client->push(
            $method,
            $this->receiver,
            $message
        );

        $this->assertInstanceOf(\Haxmedia\WbizTool\Dto\Response::class, $response);
        $this->assertArrayHasKey('status', $response->toArray());
        $this->assertArrayHasKey('message', $response->toArray());
        $this->assertArrayHasKey('messageId', $response->toArray());
        $this->assertTrue($response->getStatus());
        $this->assertEquals($this->response['message'], $response->getMessage());
        $this->assertEquals($this->response['msg_id'], $response->getMessageId());
        $this->assertTrue($response->toArray()['status']);
        $this->assertEquals($this->response['message'], $response->toArray()['message']);
        $this->assertEquals($this->response['msg_id'], $response->toArray()['messageId']);
    }
}