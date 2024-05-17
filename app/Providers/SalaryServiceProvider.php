<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Http\Request;
use App\Service\SalaryService;
use Illuminate\Support\ServiceProvider;


class SalaryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SalaryService::class, function () {
            $request = $this->app->make(Request::class);
            return new SalaryService($request);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
