<?php

namespace App\Events\Statistics;

use App\Events\DashboardEvent;

class WooCommerceOrderFetched extends DashboardEvent
{
    public $orders;

    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }
}
