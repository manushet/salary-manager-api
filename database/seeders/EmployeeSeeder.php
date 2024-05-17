<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory() 
            ->hasHourlyPayments(2)
            ->create([
                'id' => 1,
                'password' => Hash::make('12345'),
                'email' => 'test2@mail.com',
            ]);

        Employee::factory() 
            ->hasHourlyPayments(3)
            ->create([
                'id' => 2,
                'password' => Hash::make('12345'),
                'email' => 'test3@mail.com',
            ]);

        Employee::factory() 
            ->hasHourlyPayments(1)
            ->create([
                'id' => 3,
                'password' => Hash::make('12345'),
                'email' => 'test4@mail.com',
            ]);
    }
}
