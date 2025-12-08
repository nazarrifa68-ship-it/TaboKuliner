<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            
            $table->string('menu_name'); // simpan nama, jika menu dihapus masih ada record
            $table->string('menu_image')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // harga saat order dibuat
            $table->decimal('subtotal', 10, 2); // price * quantity
            
            $table->text('notes')->nullable(); // catatan khusus item (ex: tidak pedas)
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};