<?php


namespace Tests\Unit\MessageType;


use Haxmedia\WbizTool\Enum\Type;
use Haxmedia\WbizTool\MessageType\ImageUrl;
use Haxmedia\WbizTool\MessageType\MessageType;
use Tests\TestCase;

/**
 * Class ImageUrlTest
 * @package Tests\Unit\MessageType
 */
class ImageUrlTest extends TestCase
{

    /** @test */
    public function is_message_type_valid()
    {
        $message = 'Test message';
        $url     = 'https://example.com/Image.jpg';
        $type    = Type::IMAGE;

        $messageType = new ImageUrl($message, $url);

        $this->assertInstanceOf(MessageType::class, $messageType);
        $this->assertArrayHasKey('msg_type', $messageType->getParams());
        $this->assertArrayHasKey('msg', $messageType->getParams());
        $this->assertArrayHasKey('img_url', $messageType->getParams());
        $this->assertEquals($message, $messageType->getParams()['msg']);
        $this->assertEquals($type, $messageType->getParams()['msg_type']);
        $this->assertEquals($url, $messageType->getParams()['img_url']);
    }
}