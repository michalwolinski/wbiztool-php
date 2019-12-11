<?php


namespace Haxmedia\WbizTool\Dto;


/**
 * Class Receiver
 * @package Haxmedia\WbizTool\Dto
 */
class Receiver
{
    /**
     * @var int
     */
    private int $phone;
    /**
     * @var int|null
     */
    private ?int $countryCode;

    /**
     * Receiver constructor.
     *
     * @param int $phone
     * @param int|null $countryCode
     */
    public function __construct(int $phone, ?int $countryCode = null)
    {
        $this->phone = $phone;
        $this->countryCode = $countryCode;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @return int|null
     */
    public function getCountryCode(): ?int
    {
        return $this->countryCode;
    }

    /**
     * @return int
     */
    public function toNumber(): int
    {
        return $this->getCountryCode() . $this->getPhone();
    }
}