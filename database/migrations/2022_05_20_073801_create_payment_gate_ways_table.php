<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGateWaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gate_ways', function (Blueprint $table) {
            $table->id();
            $table->string('payment_gateway_name')->unique();
            $table->string('key');
            $table->string('salt');
            $table->string('checkout_url');
            $table->boolean('active_status')->default(1)->comment('0 menas in-active 1 means active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_gate_ways');
    }
}
