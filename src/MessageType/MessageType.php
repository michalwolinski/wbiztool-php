<?php


namespace Haxmedia\WbizTool\MessageType;


/**
 * Class MessageType
 * @package Haxmedia\WbizTool\MessageType
 */
abstract class MessageType
{
    /**
     * @var int
     */
    protected int $messageType;
    /**
     * @var string
     */
    protected string $message;

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'msg_type' => $this->messageType,
            'msg'      => $this->message
        ];
    }
}