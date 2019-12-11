<?php


namespace Tests\Unit\Method;


use Haxmedia\WbizTool\Method\CancelMessage;
use Haxmedia\WbizTool\Method\Method;
use Tests\TestCase;

/**
 * Class CancelMessageTest
 * @package Tests\Unit\Method
 */
class CancelMessageTest extends TestCase
{

    /** @test */
    public function is_method_valid()
    {
        $method = new CancelMessage(12345);

        $this->assertInstanceOf(Method::class, $method);
    }
}