<?php

namespace App\Console\Components\Statistics;

use App\Events\Statistics\WooCommerceOrderFetched;
use Illuminate\Console\Command;
use Woocommerce;

class FetchWooCommerceOrder extends Command
{
    protected $signature = 'dashboard:fetch-woo-commerce-order';

    protected $description = 'Fetch Lastest WooCommerce Orders';

    public function handle()
    {
        $this->info('Fetching WooCommerce Orders');

        $orders = Woocommerce::get('orders');

        $return_arr = [];
        foreach ($orders as $order) {
            $return_order = [];
            $return_order['number'] = $order['number'];
            $return_order['date_created'] = $order['date_created'];
            $return_order['status'] = ucfirst($order['status']);
            $return_order['total'] = $order['total'];
            $return_order['billing'] = $order['billing'];
            $return_arr[] = $return_order;
        }

        event(new WooCommerceOrderFetched($return_arr));

        $this->info('All done!');
    }
}