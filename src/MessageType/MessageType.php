<?php


namespace Haxmedia\WbizTool\MessageType;


interface MessageType
{
    /**
     * @return array
     */
    public function getParams(): array;
}