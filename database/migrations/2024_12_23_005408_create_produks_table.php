<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();  // Kolom ID
            $table->string('name');  // Nama produk
            $table->text('description');  // Deskripsi produk
            $table->decimal('price', 8, 2);  // Harga produk
            $table->enum('type', ['sound', 'tenda', 'dekorasi']);  // Jenis produk
            $table->integer('stock');
            $table->string('photo_main');
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->string('photo_4')->nullable();
            $table->timestamps();  // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
