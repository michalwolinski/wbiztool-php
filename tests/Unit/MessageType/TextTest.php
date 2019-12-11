<?php


namespace Tests\Unit\MessageType;


use Haxmedia\WbizTool\MessageType\MessageType;
use Haxmedia\WbizTool\MessageType\Text;
use Tests\TestCase;

/**
 * Class TextTest
 * @package Tests\Unit\MessageType
 */
class TextTest extends TestCase
{

    /** @test */
    public function is_message_type_valid()
    {
        $message = 'Test message';
        $type    = 0;

        $messageType = new Text($message);

        $this->assertInstanceOf(MessageType::class, $messageType);
        $this->assertArrayHasKey('msg_type', $messageType->getParams());
        $this->assertArrayHasKey('msg', $messageType->getParams());
        $this->assertEquals($message, $messageType->getParams()['msg']);
        $this->assertEquals($type, $messageType->getParams()['msg_type']);
    }
}