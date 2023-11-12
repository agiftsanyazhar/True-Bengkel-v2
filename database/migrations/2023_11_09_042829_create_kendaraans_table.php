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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('stnk')->unique();
            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('brand_id')
                ->constrained('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('tipe_motor_id')
                ->constrained('tipe_motors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('no_mesin')->unique();
            $table->string('no_rangka')->unique();
            $table->integer('tahun');
            $table->string('warna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
