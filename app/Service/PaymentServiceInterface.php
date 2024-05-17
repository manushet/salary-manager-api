<?php

declare(strict_types=1);

namespace App\Service;

use Illuminate\Database\Eloquent\Collection;

interface PaymentServiceInterface
{
    public function add(array $validatedData): void;

    public static function pay(): void;

    public static function unpaid(): Collection;
}