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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('headline');
            $table->longText('description');
            $table->longText('location');
            $table->longText('map');
            $table->string('email');
            $table->string('phone');
            $table->string('opening_hours');
            $table->string('closing_hours');
            $table->string('hero_image');
            $table->string('about_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
