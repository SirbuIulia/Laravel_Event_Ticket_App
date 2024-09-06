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
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('code');
            $table->decimal('price');
            $table->string('seat');
            $table->string('ticket_type');
            $table->string('payment_details');
            $table->decimal('discount', 8, 2);
            $table->integer('id_order');
            $table->foreign('id_order')-> references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
