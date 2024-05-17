<?php

declare(strict_types=1);

namespace App\Providers;

use App\Service\HourlyPaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(HourlyPaymentService::class, function () {
            return new HourlyPaymentService();
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
