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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');

            $table->enum('payment_method', ['qris', 'bank_transfer']);
            $table->decimal('amount', 12, 2);

            // Tambahan untuk integrasi Midtrans
            $table->string('provider')->default('midtrans');
            $table->string('transaction_id')->nullable(); // dari Midtrans
            $table->string('midtrans_order_id')->nullable(); // order_id Midtrans
            $table->text('qris_url')->nullable(); // untuk tampilkan QRIS
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');

            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
