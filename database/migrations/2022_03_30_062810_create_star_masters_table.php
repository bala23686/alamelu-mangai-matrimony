<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star_masters', function (Blueprint $table) {
            $table->id();
            $table->string('star_name');
            $table->boolean('star_status')->default(true);
            $table->unsignedBigInteger('star_rasi_id')->nullable()->default(null);
            $table->foreign('star_rasi_id')->references('id')->on('rasi_masters');
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
        Schema::dropIfExists('star_masters');
    }
}
