<?php

use App\Models\Ruangan;
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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ruangan::class);
            $table->string('nama');
            $table->string('merek');
            $table->integer('jumlah');
            $table->enum('kondisi', ['Baik', 'Rusak']);
            $table->string('asal_barang');
            $table->enum('Ketersediaan', ['Ada', 'Tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
