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
            $table->string('invoice_code')->unique();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->text('pickup_address');
            $table->decimal('weight', 8, 2);
            $table->decimal('subtotal', 12, 2);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('total_price', 12, 2);
            $table->enum('payment_method', ['cod', 'transfer', 'qris', 'ewallet']);
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('laundry_status', ['order_masuk', 'menunggu_pickup', 'sedang_dicuci', 'sedang_dikeringkan', 'sedang_disetrika', 'siap_diantar', 'selesai', 'dibatalkan'])->default('order_masuk');
            $table->enum('service_order', ['pickup', 'delivery'])->default('pickup');
            $table->dateTime('pickup_date')->nullable();
            $table->dateTime('estimated_finish_date')->nullable();
            $table->text('notes')->nullable();
            $table->text('qr_code')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
