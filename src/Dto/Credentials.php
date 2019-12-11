<?php


namespace Haxmedia\WbizTool\Dto;


/**
 * Class Credentials
 * @package Haxmedia\WbizTool\Dto
 */
class Credentials
{
    /**
     * @var int
     */
    private int $clientId;
    /**
     * @var string
     */
    private string $apiKey;
    /**
     * @var int
     */
    private int $whatsappClientId;
    /**
     * @var string
     */
    private string $host = 'https://wbiztool.com/api/v1';

    /**
     * Credentials constructor.
     *
     * @param int $clientId
     * @param string $apiKey
     * @param int $whatsappClientId
     * @param string|null $host
     */
    public function __construct(int $clientId, string $apiKey, int $whatsappClientId, ?string $host = null)
    {
        $this->clientId         = $clientId;
        $this->apiKey           = $apiKey;
        $this->whatsappClientId = $whatsappClientId;
        $this->host             = $host ??= $this->host;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return int
     */
    public function getWhatsappClientId(): int
    {
        return $this->whatsappClientId;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'client_id'       => $this->getClientId(),
            'api_key'         => $this->getApiKey(),
            'whatsapp_client' => $this->getWhatsappClientId()
        ];
    }
}