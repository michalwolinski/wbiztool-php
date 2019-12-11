<?php


namespace Tests\Unit\Dto;

use Haxmedia\WbizTool\Dto\Receiver;
use Tests\TestCase;

/**
 * Class ReceiverTest
 * @package Tests\Unit\Dto
 */
class ReceiverTest extends TestCase
{

    /** @test */
    public function if_dto_is_correct()
    {
        $phone            = 123456;
        $countryCode      = 48;

        $dto = new Receiver(
            $phone,
            $countryCode
        );

        $this->assertEquals($phone, $dto->getPhone());
        $this->assertEquals($countryCode, $dto->getCountryCode());
        $this->assertEquals($countryCode . $phone, $dto->toNumber());
    }
}