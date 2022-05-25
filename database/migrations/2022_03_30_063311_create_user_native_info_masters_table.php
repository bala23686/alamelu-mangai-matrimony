<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNativeInfoMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_native_info_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_country_id')->nullable();
            $table->foreign('user_country_id')->references('id')->on('country_masters');
            $table->unsignedBigInteger('user_state_id')->nullable();
            $table->foreign('user_state_id')->references('id')->on('state_masters');
            $table->unsignedBigInteger('user_city_id')->nullable();
            $table->foreign('user_city_id')->references('id')->on('city_masters');
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
        Schema::dropIfExists('user_native_info_masters');
    }
}
