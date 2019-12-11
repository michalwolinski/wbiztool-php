<?php


namespace Haxmedia\WbizTool\MessageType;


/**
 * Class AbstractMessageType
 * @package Haxmedia\WbizTool\MessageType
 */
abstract class AbstractMessageType implements MessageType
{
    /**
     * @var int
     */
    protected int $messageType = 0;
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