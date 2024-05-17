<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\HourlyPaymentService;

class PaymentController extends Controller
{

    public function __construct(
        private HourlyPaymentService $hourlyPaymentService
    )
    {
    }

    public function store(Request $request): void
    {
        if ($request->has("hours")) {
            $validatedData = $request->validate([
                'hours' => 'required|numeric|gt:0',
                'employee_id' => 'required|exists:employees,id|integer|min:1'
            ]);
            
            $this->hourlyPaymentService->add($validatedData);
        } else {
            $validatedData = $request->validate([
                'employee_id' => 'required|exists:employees,id|integer|min:1'
            ]);
        }      
    }
}
