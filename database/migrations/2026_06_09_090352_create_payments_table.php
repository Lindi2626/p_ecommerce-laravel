<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->unique()->nullable(); // dari Midtrans
            $table->decimal('amount', 10, 2);
            $table->enum('status', [
                'pending',
                'success',
                'failed',
                'expired'
            ])->default('pending');
            $table->string('payment_method')->nullable(); // gopay, bca, dll
            $table->string('snap_token')->nullable();     // token Midtrans
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};