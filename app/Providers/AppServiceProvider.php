<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Service\Accessory\AccessoryService;
use App\Http\Service\Accessory\CpuService;

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

        Paginator::useBootstrap();

        // Limit requests count in verify-email
        RateLimiter::for('verify-email', function (Request $request) {
            return Limit::perMinute(1)->response(function() {
                return Redirect::route('verification.notice')->with(['limit' => __('A repeated request can be sent no earlier than a minute later')]);
            });
        });
        
    }
}
