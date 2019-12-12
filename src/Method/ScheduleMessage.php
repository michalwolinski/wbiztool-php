<?php


namespace Haxmedia\WbizTool\Method;


use Carbon\Carbon;
use Haxmedia\WbizTool\Enum\Action;

/**
 * Class ScheduleMessage
 * @package Haxmedia\WbizTool\Method
 */
class ScheduleMessage extends Method
{
    /**
     * @var string
     */
    protected string $action = Action::SCHEDULE_MESSAGE;

    /**
     * @var array
     */
    private array $params = [];

    /**
     * @param Carbon $date
     * @param string $timeZone
     */
    public function __construct(Carbon $date, string $timeZone = 'UTC')
    {
        $this->params = [
            'date'     => $date->format('d/m/Y'),
            'time'     => $date->format('H:i'),
            'timezone' => $timeZone
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