<?php


namespace Tests\Unit\Method;


use Haxmedia\WbizTool\Method\Method;
use Haxmedia\WbizTool\Method\SendMessage;
use Tests\TestCase;

/**
 * Class SendMessageTest
 * @package Tests\Unit\Method
 */
class SendMessageTest extends TestCase
{

    /** @test */
    public function is_method_valid()
    {
        $method = new SendMessage();

        $this->assertInstanceOf(Method::class, $method);
    }
}