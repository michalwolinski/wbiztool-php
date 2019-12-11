<?php


namespace Tests\Unit\Exception;


use Haxmedia\WbizTool\Exception\WbizToolException;
use Tests\TestCase;

/**
 * Class WbizToolExceptionTest
 * @package Tests\Unit\Exception
 */
class WbizToolExceptionTest extends TestCase
{

    /**
     * @test
     * @throws WbizToolException
     */
    public function it_throw_valid_exception()
    {
        $message = 'Test exception message';
        $code    = 404;

        $this->expectException(WbizToolException::class);
        $this->expectExceptionCode($code);
        $this->expectDeprecationMessage($message);

        throw new WbizToolException($message, $code);
    }
}