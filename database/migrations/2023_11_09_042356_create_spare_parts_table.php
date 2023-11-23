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
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id();
            $table->string('spare_part_code')->unique();
            $table->foreignId('brand_id')
                ->constrained('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('tipe_motor_id')
                ->constrained('tipe_motors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('headline');
            $table->longText('description');
            $table->string('image');
            $table->integer('stock');
            $table->integer('price');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_parts');
    }
};
