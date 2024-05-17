<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\SalaryService;
use Illuminate\Http\JsonResponse;

class SalaryController extends Controller
{
    public function __construct(
        private SalaryService $salaryService
    )
    {
    }

    public function store()
    {
        $this->salaryService->pay();
    }

    public function index(): JsonResponse
    {
        return response()->json(
            $this->salaryService->unpaid(), 
            200
        );
    }
}
