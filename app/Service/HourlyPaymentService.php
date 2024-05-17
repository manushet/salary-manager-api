<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\HourlyPayment;
use Illuminate\Database\Eloquent\Collection;

class HourlyPaymentService implements PaymentServiceInterface
{    
    public function add(array $validatedData): void
    {        
        HourlyPayment::create([
            ...$validatedData,
            'rate' => HourlyPayment::HOUR_RATE,
        ]);
    }
    
    public static function pay(): void 
    {
        HourlyPayment::unpaidTransactions()
        ->get()
        ->each(function (HourlyPayment $hourlyPayment) {
            $hourlyPayment->paid_at = (new \DateTime())->format("Y-m-d H:i:s");
            $hourlyPayment->save();
        });
    }   

    public static function unpaid(): Collection 
    {
        return HourlyPayment::unpaidByCustomer()->get() ?? [];
    }
}