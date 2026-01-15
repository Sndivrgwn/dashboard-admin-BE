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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('shipping_address_id')->constrained('addresses');
            $table->string('order_number')->unique();
            $table->string('status');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount_total', 10, 2);
            $table->decimal('shipping_total', 10, 2);
            $table->decimal('grand_total', 10, 2);
            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
