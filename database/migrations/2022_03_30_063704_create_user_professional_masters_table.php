<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfessionalMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_professional_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_education_id')->nullable()->default(null);
            $table->string('user_education_details')->nullable()->default(null);
            $table->string('tenth_marksheet')->nullable()->default(null);
            $table->boolean('tenth_mark_sheet_uploaded')->default(0);
            $table->string('twelth_marksheet')->nullable()->default(null);
            $table->boolean('twelth_mark_sheet_uploaded')->default(0);
            $table->string('clg_tc')->nullable()->default(null);
            $table->boolean('clg_tc_is_uploaded')->default(0);
            $table->unsignedBigInteger('user_job_id')->nullable();
            $table->string('user_job_details')->nullable()->default(null);
            $table->unsignedBigInteger('user_job_country')->nullable();
            $table->unsignedBigInteger('user_job_state')->nullable();
            $table->unsignedBigInteger('user_job_city')->nullable();
            $table->bigInteger('user_annual_income')->nullable()->default(50000);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_job_id')->references('id')->on('job_masters');
            $table->foreign('user_job_country')->references('id')->on('country_masters');
            $table->foreign('user_job_state')->references('id')->on('state_masters');
            $table->foreign('user_job_city')->references('id')->on('city_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_professional_masters');
    }
}
