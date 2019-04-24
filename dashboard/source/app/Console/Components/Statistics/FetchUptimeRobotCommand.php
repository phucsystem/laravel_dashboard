<?php

namespace App\Console\Components\Statistics;

use App\Events\Uptime\UptimeRobotFetched;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchUptimeRobotCommand extends Command
{
    protected $signature = 'dashboard:fetch-uptime-robot';

    protected $description = 'Fetch Uptime Robot';

    public function handle()
    {
        $this->info('Fetching Uptime Robot');
        $apiKey = env('UPTIMEROBOT_KEY');

        $client = new Client();
        $res = $client->post('https://api.uptimerobot.com/v2/getMonitors', [
            'form_params' => [
                'api_key' => $apiKey,
                'format' => 'json',
                'all_time_uptime_durations' => 1,
                'all_time_uptime_ratio' => 1,
                'response_times_average' => 1
            ]
        ]);

        $resObj = \GuzzleHttp\json_decode($res->getBody()->getContents());
        $monitor = array_pop($resObj->monitors);
        $uptime_durations = explode('-', $monitor->all_time_uptime_durations);
        event(new UptimeRobotFetched($monitor->status, $uptime_durations[0], $uptime_durations[1]));

        $this->info('All done!');
    }
}
