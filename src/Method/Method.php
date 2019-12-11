<?php


namespace Haxmedia\WbizTool\Method;


use GuzzleHttp\Client;
use Haxmedia\WbizTool\Dto\Credentials;
use Haxmedia\WbizTool\Dto\Receiver;
use Haxmedia\WbizTool\Dto\Response;
use Haxmedia\WbizTool\Exception\WbizToolException;
use Haxmedia\WbizTool\MessageType\MessageType;

/**
 * Interface Method
 * @package Haxmedia\WbizTool\Method
 */
interface Method
{
    /**
     * @param Client $client
     * @param Credentials $credentials
     * @param Receiver|null $receiver
     * @param MessageType|null $message
     *
     * @return Response
     * @throws WbizToolException
     */
    public function push(Client $client, Credentials $credentials, ?Receiver $receiver = null, ?MessageType $message = null): Response;

}