<?php


namespace Haxmedia\WbizTool\Method;


use Haxmedia\WbizTool\Enum\Action;

/**
 * Class CancelMessage
 * @package Haxmedia\WbizTool\Method
 */
class CancelMessage extends Method
{
    /**
     * @var string
     */
    protected string $action = Action::CANCEL_MESSAGE;

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