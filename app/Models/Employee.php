<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\HourlyPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hourlyPayments(): HasMany
    {
        return $this->hasMany(HourlyPayment::class);
    }

}
