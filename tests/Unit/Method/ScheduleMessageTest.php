<?php


namespace Tests\Unit\Method;


use Carbon\Carbon;
use Haxmedia\WbizTool\Method\Method;
use Haxmedia\WbizTool\Method\ScheduleMessage;
use Tests\TestCase;

/**
 * Class ScheduleMessageTest
 * @package Tests\Unit\Method
 */
class ScheduleMessageTest extends TestCase
{

    /** @test */
    public function is_method_valid()
    {
        $method = new ScheduleMessage(
            Carbon::now(),
            'UTC'
        );

        $this->assertInstanceOf(Method::class, $method);
    }
}