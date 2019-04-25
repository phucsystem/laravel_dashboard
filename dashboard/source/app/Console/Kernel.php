<?php

namespace App\Console;

use App\Console\Components\Buienradar\FetchBuienradarForecastsCommand;
use App\Console\Components\Mail\FetchLastGmail;
use App\Console\Components\Statistics\FetchUptimeRobotCommand;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Components\Trains\FetchTrainsCommand;
use App\Console\Components\Velo\FetchVeloStationsCommand;
use App\Console\Components\TeamMember\FetchTasksCommand;
use App\Console\Components\TeamMember\FetchStatusCommand;
use App\Console\Components\Dashboard\SendHeartbeatCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Components\Calendar\FetchCalendarEventsCommand;
use App\Console\Components\Statistics\FetchGitHubTotalsCommand;
use App\Console\Components\Dashboard\DetermineAppearanceCommand;
use App\Console\Components\TeamMember\FetchCurrentTracksCommand;
use App\Console\Components\Statistics\FetchPackagistTotalsCommand;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(SendHeartbeatCommand::class)->everyMinute();
        $schedule->command(DetermineAppearanceCommand::class)->everyMinute();
        $schedule->command(FetchUptimeRobotCommand::class)->everyMinute();
        $schedule->command(FetchLastGmail::class)->everyMinute();
        $schedule->command('websockets:clean')->daily();
    }

    public function commands()
    {
        $commandDirectries = glob(app_path('Console/Components/*'), GLOB_ONLYDIR);
        $commandDirectries[] = app_path('Console');

        collect($commandDirectries)->each(function (string $commandDirectory) {
            $this->load($commandDirectory);
        });
    }
}
