<?php


namespace Tests\Unit\Dto;

use Haxmedia\WbizTool\Dto\Credentials;
use Tests\TestCase;

/**
 * Class CredentialsTest
 * @package Tests\Unit\Dto
 */
class CredentialsTest extends TestCase
{

    /** @test */
    public function if_dto_is_correct()
    {
        $clientId         = 123;
        $apiKey           = '123abc';
        $whatsappClientId = 456;
        $host             = 'http://example.com/api/v1';

        $dto = new Credentials(
            $clientId,
            $apiKey,
            $whatsappClientId,
            $host
        );

        $this->assertEquals($clientId, $dto->getClientId());
        $this->assertEquals($apiKey, $dto->getApiKey());
        $this->assertEquals($whatsappClientId, $dto->getWhatsappClientId());
        $this->assertEquals($host, $dto->getHost());
        $this->assertArrayHasKey('client_id', $dto->getParams());
        $this->assertArrayHasKey('api_key', $dto->getParams());
        $this->assertArrayHasKey('whatsapp_client', $dto->getParams());
    }
}