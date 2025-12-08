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
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
            $table->string('order_number')->unique();
            
            // Amounts
            $table->decimal('subtotal', 10, 2); // total harga items
            $table->decimal('shipping_cost', 10, 2)->default(10000);
            $table->decimal('service_fee', 10, 2)->default(2000);
            $table->decimal('discount', 10, 2)->default(0); // jika ada promo
            $table->decimal('total_amount', 10, 2); // grand total
            
            // Status
            $table->enum('status', [
                'pending',      // menunggu pembayaran
                'paid',         // sudah bayar, belum diproses
                'processing',   // sedang dimasak/disiapkan
                'ready',        // siap dikirim
                'shipped',      // dalam pengiriman
                'delivered',    // sudah sampai
                'completed',    // selesai (customer confirm)
                'cancelled'     // dibatalkan
            ])->default('pending');
            
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid');
            $table->string('payment_method')->nullable(); // COD, Transfer, E-wallet, dll
            $table->string('payment_proof')->nullable(); // foto bukti transfer
            
            // Additional Info
            $table->text('notes')->nullable(); // catatan dari customer
            $table->text('cancel_reason')->nullable(); // alasan pembatalan
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};