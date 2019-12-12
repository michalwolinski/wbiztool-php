<?php


namespace Haxmedia\WbizTool\MessageType;


use Haxmedia\WbizTool\Enum\Type;

/**
 * Class FileUrl
 * @package Haxmedia\WbizTool\MessageType
 */
class FileUrl extends MessageType
{

    /**
     * @var int
     */
    protected int $messageType = Type::FILE;
    /**
     * @var string
     */
    private string $fileUrl;
    /**
     * @var string
     */
    private string $fileName;

    /**
     * Text constructor.
     *
     * @param string $message
     * @param string $fileUrl
     * @param string $fileName
     */
    public function __construct(string $message, string $fileUrl, string $fileName)
    {
        $this->message  = $message;
        $this->fileUrl  = $fileUrl;
        $this->fileName = $fileName;
    }


    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'msg_type'  => $this->messageType,
            'msg'       => $this->message,
            'file_url'  => $this->fileUrl,
            'file_name' => $this->fileName
        ];
    }
}