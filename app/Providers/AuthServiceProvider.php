<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Cpu;
use App\Models\Cooller;
use App\Models\Motherboard;
use App\Models\Hdd;
use App\Models\Ssd;
use App\Models\PcCase;
use App\Models\PowerSupply;
use App\Models\Ram;
use App\Models\VideoCard;
use App\Models\Assemble;
use App\Policies\AccessoryPolicy;
use App\Policies\AssemblePolicy;
use Illuminate\Auth\Notifications\ResetPassword;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        '\App\Models\News' => '\App\Policies\NewsPolicy',
        '\App\Models\User' => '\App\Policies\UserPolicy',
        Cpu::class => AccessoryPolicy::class,
        Cooller::class => AccessoryPolicy::class,
        Motherboard::class => AccessoryPolicy::class,
        Hdd::class => AccessoryPolicy::class,
        Ssd::class => AccessoryPolicy::class,
        PcCase::class => AccessoryPolicy::class,
        PowerSupply::class => AccessoryPolicy::class,
        Ram::class => AccessoryPolicy::class,
        VideoCard::class => AccessoryPolicy::class,
        Assemble::class => AssemblePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // ResetPassword::createUrlUsing(function ($user, string $token) {
        //     return 'https://technofanateka.ru/reset-password?token='.$token;
        // });

    }
}
