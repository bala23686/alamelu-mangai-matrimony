<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasteMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caste_masters', function (Blueprint $table) {
            $table->id();
            $table->string('caste_name');
            $table->tinyInteger('caste_status')->default(true);
            $table->unsignedBigInteger('caste_religion')->nullable()->default(null);
            $table->foreign('caste_religion')->references('id')->on('religion_masters');
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
        Schema::dropIfExists('caste_masters');
    }
}
