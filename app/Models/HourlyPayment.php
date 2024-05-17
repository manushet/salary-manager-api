<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HourlyPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'hours',
        'rate',
        'employee_id',
        'paid_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public const HOUR_RATE = 1800;

    public static function unpaidTransactions()
    {
        return static::whereNull('paid_at');     
    }

    public static function unpaidByCustomer()
    {
        return static::selectRaw('employee_id, SUM(hours*rate) as amount')
            ->whereNull('paid_at')
            ->groupBy('employee_id');     
    }
}
