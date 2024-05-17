<?php

declare(strict_types=1);

namespace App\Service;

use Illuminate\Database\Eloquent\Collection;

class SalaryService
{
    public function __construct(
        private HourlyPaymentService $hourlyPaymentService
    )
    {
    }

    public function pay(): void 
    {
        $this->hourlyPaymentService::pay();
    }

    public function unpaid(): Collection
    {
        return $this->hourlyPaymentService::unpaid();
    }
}