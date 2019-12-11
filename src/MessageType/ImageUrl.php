<?php


namespace Haxmedia\WbizTool\MessageType;


/**
 * Class ImageUrl
 * @package Haxmedia\WbizTool\MessageType
 */
class ImageUrl extends AbstractMessageType
{

    /**
     * @var int
     */
    protected int $messageType = 1;
    /**
     * @var string
     */
    private string $imageUrl;

    /**
     * Text constructor.
     *
     * @param string $message
     * @param string $imageUrl
     */
    public function __construct(string $message, string $imageUrl)
    {
        $this->message  = $message;
        $this->imageUrl = $imageUrl;
    }


    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'msg_type' => $this->messageType,
            'msg'      => $this->message,
            'img_url'  => $this->imageUrl
        ];
    }
}