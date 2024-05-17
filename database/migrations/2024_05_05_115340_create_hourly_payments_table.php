<?php

use App\Models\HourlyPayment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hourly_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('hours')->unsigned();
            $table->integer('rate')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->dateTime('paid_at')->nullable(true)->default(null);
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->index(['employee_id', 'paid_at'], 'hourly_payments_employee_id_paid_at_idx');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hourly_payments');
    }
};
