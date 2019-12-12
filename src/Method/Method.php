<?php


namespace Haxmedia\WbizTool\Method;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use Haxmedia\WbizTool\Dto\Credentials;
use Haxmedia\WbizTool\Dto\Receiver;
use Haxmedia\WbizTool\Dto\Response;
use Haxmedia\WbizTool\Exception\WbizToolException;
use Haxmedia\WbizTool\MessageType\MessageType;
use Psr\Http\Message\UriInterface;

/**
 * Class Method
 * @package Haxmedia\WbizTool\Method
 */
abstract class Method
{
    /**
     * @var Client
     */
    protected Client $client;
    /**
     * @var Credentials
     */
    protected Credentials $credentials;
    /**
     * @var MessageType|null
     */
    protected ?MessageType $message;
    /**
     * @var Receiver|null
     */
    protected ?Receiver $receiver;
    /**
     * @var string
     */
    protected string $action;

    /**
     * @param Client $client
     * @param Credentials $credentials
     * @param Receiver|null $receiver
     * @param MessageType|null $message
     *
     * @return Response
     * @throws WbizToolException
     */
    public function push(Client $client, Credentials $credentials, ?Receiver $receiver = null, ?MessageType $message = null): Response
    {
        $this->client      = $client;
        $this->credentials = $credentials;
        $this->receiver    = $receiver;
        $this->message     = $message;

        try {
            $response = $this->client->post(
                $this->getUri(),
                [
                    'form_params' => $this->generateParams()
                ]
            );
        } catch (Exception $exception) {
            throw new WbizToolException($exception->getMessage(), $exception->getCode());
        }

        return Response::fromResponse($response);
    }

    /**
     * @return UriInterface
     */
    protected function getUri(): UriInterface
    {
        return new Uri(sprintf("%s/%s/",
            $this->credentials->getHost(),
            $this->getAction()
        ));
    }

    /**
     * @return array
     */
    protected function generateParams(): array
    {
        $params = [];
        $params += $this->credentials->getParams();
        $params += $this->getParams();

        if ($this->message) {
            $params += $this->message->getParams();
        }

        if ($this->receiver) {
            $params['phone'] = $this->receiver->toNumber();
        }

        return $params;
    }

    /**
     * @return string
     */
    protected function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return array
     */
    protected function getParams(): array
    {
        return [];
    }
}