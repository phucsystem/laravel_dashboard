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
        $return_arr = [];
        foreach ($resObj->monitors as $monitor){
            $uptime_durations = explode('-', $monitor->all_time_uptime_durations);
            $return_data = [];
            $return_data['name'] = $monitor->friendly_name;
            $return_data['url'] = $monitor->url;
            $return_data['status'] = $monitor->status;
            $return_data['uptime_duration'] = $uptime_durations[0];
            $return_arr[] = $return_data;
        }
        event(new UptimeRobotFetched($return_arr));

        $this->info('All done!');
    }
}
