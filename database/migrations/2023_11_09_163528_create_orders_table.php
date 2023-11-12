<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->default('ODR-' . Carbon::now()->format('dmYHis'));
            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('is_service');
            $table->integer('is_paid')->default(0);
            $table->string('payment_at')->default(0);
            $table->integer('total_shopping');
            $table->string('bukti_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
