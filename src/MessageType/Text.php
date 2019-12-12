<?php


namespace Haxmedia\WbizTool\MessageType;


use Haxmedia\WbizTool\Enum\Type;

/**
 * Class Text
 * @package Haxmedia\WbizTool\MessageType
 */
class Text extends MessageType
{

    /**
     * @var int
     */
    protected int $messageType = Type::TEXT;

    /**
     * Text constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }
}