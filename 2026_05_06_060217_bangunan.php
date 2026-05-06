<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('bangunans', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->decimal('luas_kamar', 8, 2);
            $table->enum('jenis_kamar', ['campuran', 'putra', 'putri']);
            $table->boolean('is_full')->default(false);
            $table->unsignedBigInteger('harga');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('bangunans');
    }
};
