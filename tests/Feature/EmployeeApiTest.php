<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeApiTest extends TestCase
{
    
    use RefreshDatabase;
    
    public function test_create_employee_request_returns_200_response(): void
    {        
        $data = [
            'email' => 'test1@mail.com',
            'password' => '12345'
        ];
        
        $response = $this->postJson('/api/employees', $data)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                 ->missingAll(['message', 'error']))
            ->assertStatus(201);

        $this->assertDatabaseHas('employees', [
                'email' => 'test1@mail.com',
            ])
            ->assertDatabaseCount('employees', 4);
    }

    public function test_create_employee_request_with_wrong_email_returns_422_response(): void
    {
        $data = [
            'email' => 'test1',
            'password' => '12345'
        ];
        
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/employees', $data)
            ->assertUnprocessable();

        $this->assertDatabaseCount('employees', 3);
    }

    public function test_create_employee_request_with_empty_body_returns_422_response(): void
    {               
        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/employees', [])
            ->assertUnprocessable();

        $this->assertDatabaseCount('employees', 3);
    }

    public function test_create_employee_request_with_doubled_email_returns_422_response(): void
    {       
        $this->expectsDatabaseQueryCount(4);
        
        $data = [
            'email' => 'test1@mail.com',
            'password' => '12345'
        ];      
        
        $this->postJson('/api/employees', $data);

        $response = $this->withHeaders([
                'Accept' => 'application-json',
            ])
            ->postJson('/api/employees', $data)
            ->assertUnprocessable();

        $this->assertDatabaseCount('employees', 4);
    }
}