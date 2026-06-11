<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique(); // contoh: ORD-20260610-001
            $table->enum('status', [
                'pending',
                'paid',
                'processing',
                'shipped',
                'completed',
                'cancelled'
            ])->default('pending');
            $table->decimal('total_amount', 12, 2);
            // Data pengiriman — PAY-01
            $table->string('shipping_name');
            $table->text('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_postal_code');
            $table->string('shipping_phone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};