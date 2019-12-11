<?php


namespace Haxmedia\WbizTool\MessageType;


/**
 * Class Text
 * @package Haxmedia\WbizTool\MessageType
 */
class Text extends AbstractMessageType
{

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