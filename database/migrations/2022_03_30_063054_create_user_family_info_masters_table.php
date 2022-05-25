<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFamilyInfoMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_family_info_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_father_name')->nullable()->default(null);
            $table->string('user_father_job_details')->nullable()->default(null);
            $table->string('user_mother_name')->nullable()->default(null);;
            $table->string('user_mother_job_details')->nullable()->default(null);
            $table->unsignedBigInteger('user_family_status')->nullable();
            $table->foreign('user_family_status')->references('id')->on('family_status_sub_masters');
            $table->integer('no_of_sibling')->default(0)->nullable();
            $table->integer('no_of_brothers')->default(0)->nullable();
            $table->integer('no_of_sisters')->default(0)->nullable();
            $table->integer('no_of_brothers_married')->default(0)->nullable();
            $table->integer('no_of_sisters_married')->default(0)->nullable();
            $table->longText('user_sibling_details')->nullable()->default(null);
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
        Schema::dropIfExists('user_family_info_masters');
    }
}
