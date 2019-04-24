<?php

namespace App\Events\Uptime;

use App\Events\DashboardEvent;

class UptimeRobotFetched extends DashboardEvent
{
    /** @var int */
    public $status;

    /** @var int */
    public $uptime;

    /** @var int */
    public $downtime;

    public function __construct(int $status, int $uptime, int $downtime)
    {
        $this->status = $status;

        $this->uptime = $uptime;

        $this->downtime = $downtime;
    }
}
