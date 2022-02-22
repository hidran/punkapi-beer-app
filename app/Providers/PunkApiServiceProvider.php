<?php

namespace App\Providers;

use App\Services\PunkApiService;
use Carbon\Laravel\ServiceProvider;

class PunkApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PunkApiService::class, fn() => new PunkApiService(config('punk.endpoint')));
    }
}
