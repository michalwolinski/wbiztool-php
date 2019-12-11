<?php


namespace Tests\Unit\Dto;

use Haxmedia\WbizTool\Dto\Response;
use Tests\TestCase;

/**
 * Class ResponseTest
 * @package Tests\Unit\Dto
 */
class ResponseTest extends TestCase
{

    /** @test */
    public function if_dto_is_correct()
    {
        $status    = true;
        $message   = "Test message";
        $messageId = 12345;

        $dto = new Response(
            $status,
            $message,
            $messageId
        );

        $this->assertEquals($status, $dto->getStatus());
        $this->assertEquals($message, $dto->getMessage());
        $this->assertEquals($messageId, $dto->getMessageId());
    }
}