<?php

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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('midtrans_transaction_id')->nullable();
            $table->string('midtrans_order_id')->nullable();
            $table->integer('midtrans_gross_amount')->nullable();
            $table->string('midtrans_payment_type')->nullable();
            $table->string('snap_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn([
                'midtrans_transaction_id',
                'midtrans_order_id',
                'midtrans_gross_amount',
                'midtrans_payment_type',
                'snap_token',
            ]);
        });
    }
};
