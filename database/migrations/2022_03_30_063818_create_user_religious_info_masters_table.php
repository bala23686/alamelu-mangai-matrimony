<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReligiousInfoMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_religious_info_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_religion_id')->nullable();
            $table->foreign('user_religion_id')->references('id')->on('religion_masters');
            $table->unsignedBigInteger('user_caste_id')->nullable();
            $table->foreign('user_caste_id')->references('id')->on('caste_masters');
            $table->string('sub_caste')->nullable()->default(null);
            $table->unsignedBigInteger('user_rasi_id')->nullable();
            $table->foreign('user_rasi_id')->references('id')->on('rasi_masters');
            $table->unsignedBigInteger('user_star_id')->nullable();
            $table->foreign('user_star_id')->references('id')->on('star_masters');
            $table->integer('dhosam')->default(0);
            $table->string('dhosam_details')->default(null)->nullable()->comment('more details about dhosam if yes');
            $table->time('user_birth_time')->default(null)->nullable();
            $table->string('user_birth_place')->default(null)->nullable();
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
        Schema::dropIfExists('user_religious_info_masters');
    }
}
