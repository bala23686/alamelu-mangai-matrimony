<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable()->default(null);
            $table->foreign('country_id')->references('id')->on('country_masters');
            $table->string('state_name');
            $table->tinyInteger('state_status')->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('state_masters');
    }
}
