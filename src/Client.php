<?php


namespace Haxmedia\WbizTool;


use GuzzleHttp\Client as GuzzleClient;
use Haxmedia\WbizTool\Dto\Credentials;
use Haxmedia\WbizTool\Dto\Receiver;
use Haxmedia\WbizTool\Dto\Response;
use Haxmedia\WbizTool\Exception\WbizToolException;
use Haxmedia\WbizTool\MessageType\MessageType;
use Haxmedia\WbizTool\Method\Method;

/**
 * Class Client
 * @package Haxmedia\WbizTool
 */
class Client
{
    /**
     * @var GuzzleClient
     */
    private GuzzleClient $client;
    /**
     * @var Credentials
     */
    private Credentials $credentials;

    /**
     * Client constructor.
     *
     * @param GuzzleClient $client
     * @param Credentials $credentials
     */
    public function __construct(GuzzleClient $client, Credentials $credentials)
    {
        $this->client      = $client;
        $this->credentials = $credentials;
    }

    /**
     * @param Method $method
     * @param Receiver|null $receiver
     * @param MessageType|null $message
     *
     * @return Response
     * @throws WbizToolException
     */
    public function push(Method $method, ?Receiver $receiver = null, ?MessageType $message = null): Response
    {
        return $method->push(
            $this->client,
            $this->credentials,
            $receiver,
            $message
        );
    }
}