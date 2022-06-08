<?php

namespace App\Providers;

use App\Models\Call;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $countOrders = Order::where('progress', 1)->count();
        $countCalls = Call::where('progress', 1)->count();
        $countMessages = Message::where('viewed', 1)->count();
        view()->share('countOrders', $countOrders);
        view()->share('countCalls', $countCalls);
        view()->share('countMessages', $countMessages);

        Paginator::useBootstrap();
    }
}
