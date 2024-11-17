<?php

namespace App\Providers;

use App\Service\Country\Abstracts\CountryServiceInterface;
use App\Service\Country\CountryService;
use App\Service\Guest\Abstracts\GuestServiceInterface;
use App\Service\Guest\GuestService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * @var array|class-string[]
     */
    public array $singletons = [
        GuestServiceInterface::class => GuestService::class,
        CountryServiceInterface::class => CountryService::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
