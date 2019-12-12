<?php


namespace Haxmedia\WbizTool\Method;


use Haxmedia\WbizTool\Enum\Action;

/**
 * Class SendMessage
 * @package Haxmedia\WbizTool\Method
 */
class SendMessage extends Method
{
    /**
     * @var string
     */
    protected string $action = Action::SEND_MESSAGE;
}