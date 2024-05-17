<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalaryPaymentsApiTest extends TestCase
{
    
    use RefreshDatabase;
    
    public function test_salary_pay_request_returns_200_response(): void
    {                     
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/salary/pay')
            ->assertStatus(200);
    }

    public function test_salary_unpaid_request_returns_200_response(): void
    {       
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->getJson('/api/salary/unpaid')
            ->assertStatus(200);
    }
}