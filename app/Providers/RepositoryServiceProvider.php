<?php

namespace App\Providers;

use App\Repository\Guest\Abstracts\GuestRepositoryInterface;
use App\Repository\Guest\GuestRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array|class-string[]
     */
    public array $singletons = [
        GuestRepositoryInterface::class => GuestRepositoryEloquent::class,
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
