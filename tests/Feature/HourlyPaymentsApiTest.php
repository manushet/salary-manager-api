<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\HourlyPayment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HourlyPaymentsApiTest extends TestCase
{
    
    use RefreshDatabase;
    
    public function test_create_payment_request_returns_200_response(): void
    {              
        $data = [
            'hours' => 12,
            'employee_id' => 1
        ];
        
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/payments', $data)
            ->assertStatus(200);

        $this->assertDatabaseHas('hourly_payments', [
                'hours' => 12,
                'rate' => HourlyPayment::HOUR_RATE,
                'employee_id' => 1
            ])
            ->assertDatabaseCount('hourly_payments', 7);
    }

    public function test_create_payment_request_with_wrong_hours_returns_422_response(): void
    {
        $data = [
            'hours' => 'aaa',
            'employee_id' => 1
        ];
        
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/payments', $data)
            ->assertUnprocessable();

        $this->assertDatabaseCount('hourly_payments', 6);
    }

    public function test_create_payment_request_with_empty_body_returns_422_response(): void
    {               
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/payments', [])
            ->assertUnprocessable();

        $this->assertDatabaseCount('hourly_payments', 6);
    }

    public function test_create_payment_request_with_invalid_employee_returns_422_response(): void
    {
        $data = [
            'hours' => 3,
            'employee_id' => 99
        ];
        
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/payments', $data)
            ->assertStatus(422);

        $this->assertDatabaseCount('hourly_payments', 6);
    }    
}