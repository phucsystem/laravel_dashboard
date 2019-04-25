<?php

namespace App\Events\Uptime;

use App\Events\DashboardEvent;

class UptimeRobotFetched extends DashboardEvent
{
    /** @var array */
    public $monitors;

    public function __construct(array $monitors)
    {
        $this->monitors = $monitors;
    }
}
