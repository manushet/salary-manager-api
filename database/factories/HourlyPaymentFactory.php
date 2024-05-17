<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\HourlyPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class HourlyPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hours' => $this->faker->numberBetween(1, 10),
            'rate' => HourlyPayment::HOUR_RATE,
            'employee_id' => Employee::factory(),
        ];
    }
}
