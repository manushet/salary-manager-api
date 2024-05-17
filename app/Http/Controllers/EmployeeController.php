<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    public function store(EmployeeStoreRequest $request): EmployeeResource
    {
        $validatedRequest = $request->validated();
       
        return new EmployeeResource(Employee::create($validatedRequest));
    }
}
