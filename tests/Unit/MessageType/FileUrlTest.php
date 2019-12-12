<?php


namespace Tests\Unit\MessageType;


use Haxmedia\WbizTool\Enum\Type;
use Haxmedia\WbizTool\MessageType\FileUrl;
use Haxmedia\WbizTool\MessageType\MessageType;
use Tests\TestCase;

/**
 * Class FileUrlTest
 * @package Tests\Unit\MessageType
 */
class FileUrlTest extends TestCase
{

    /** @test */
    public function is_message_type_valid()
    {
        $message = 'Test message';
        $url     = 'https://example.com/Documents.zip';
        $name    = 'Documents.zip';
        $type    = Type::FILE;

        $messageType = new FileUrl($message, $url, $name);

        $this->assertInstanceOf(MessageType::class, $messageType);
        $this->assertArrayHasKey('msg_type', $messageType->getParams());
        $this->assertArrayHasKey('msg', $messageType->getParams());
        $this->assertArrayHasKey('file_url', $messageType->getParams());
        $this->assertArrayHasKey('file_name', $messageType->getParams());
        $this->assertEquals($message, $messageType->getParams()['msg']);
        $this->assertEquals($type, $messageType->getParams()['msg_type']);
        $this->assertEquals($url, $messageType->getParams()['file_url']);
        $this->assertEquals($name, $messageType->getParams()['file_name']);
    }
}