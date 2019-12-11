<?php


namespace Haxmedia\WbizTool\Method;


use Carbon\Carbon;

/**
 * Class CancelMessage
 * @package Haxmedia\WbizTool\Method
 */
class CancelMessage extends AbstractMethod
{
    /**
     * @var string
     */
    protected string $action = 'cancel_msg';

    /**
     * @var array
     */
    private array $params = [];

    /**
     * @param int $messageId
     */
    public function __construct(int $messageId)
    {
        $this->params = [
            'msg_id' => $messageId
        ];
    }

    /**
     * @return array
     */
    protected function getParams(): array
    {
        return $this->params;
    }
}