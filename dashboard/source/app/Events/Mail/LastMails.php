<?php

namespace App\Events\Mail;

use App\Events\DashboardEvent;

class LastMails extends DashboardEvent
{
    public $mails;

    public function __construct(array $mails)
    {
        $this->mails = $mails;
    }
}
