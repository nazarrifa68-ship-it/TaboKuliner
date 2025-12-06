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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('label', 50);  // Rumah, Kantor, dll
            $table->text('address');  // Alamat lengkap
            $table->string('city', 100);  // Kota
            $table->string('postal_code', 10);  // Kode pos
            $table->string('phone', 20);  // Nomor telepon untuk alamat ini
            $table->text('notes')->nullable();  // Catatan tambahan (patokan, dll)
            $table->boolean('is_default')->default(false);  // Alamat default
            $table->timestamps();

            // Index
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};