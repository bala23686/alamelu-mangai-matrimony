<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPreferenceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_preference_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('partner_age_from')->nullable()->default(null);
            $table->integer('partner_age_to')->nullable()->default(null);
            $table->unsignedBigInteger('partner_height_to')->nullable()->default(null);
            $table->foreign('partner_height_to')->references('id')->on('height_masters');
            $table->unsignedBigInteger('partner_height_from')->nullable()->default(null);
            $table->foreign('partner_height_from')->references('id')->on('height_masters');
            $table->unsignedBigInteger('partner_martial_status')->nullable()->default(null);
            $table->foreign('partner_martial_status')->references('id')->on('martial_status_sub_masters');
            $table->string('partner_complexion')->nullable()->default(null);
            // $table->foreign('partner_complexion')->references('id')->on('complexion_sub_masters');
            $table->string('partner_mother_tongue')->nullable()->default(null);
            // $table->foreign('partner_mother_tongue')->references('id')->on('language_masters');
            $table->string('partner_job')->nullable()->default(null);
            $table->string('partner_education')->default(null)->nullable();


            $table->string('partner_job_details', 255)->default(null)->nullable();



            $table->string('partner_job_country')->nullable()->default(null);
            // $table->foreign('partner_job_country')->references('id')->on('country_masters');
            $table->unsignedBigInteger('partner_job_state')->nullable()->default(null);
            $table->foreign('partner_job_state')->references('id')->on('state_masters');
            $table->unsignedBigInteger('partner_job_city')->nullable()->default(null);
            $table->foreign('partner_job_city')->references('id')->on('city_masters');

            $table->string('partner_education_details', 255)->default(null)->nullable();
            $table->unsignedBigInteger('partner_salary')->nullable()->default(0);
            $table->unsignedBigInteger('partner_religion')->nullable()->default(null);
            $table->foreign('partner_religion')->references('id')->on('religion_masters');
            $table->unsignedBigInteger('partner_caste')->nullable()->default(null);
            $table->foreign('partner_caste')->references('id')->on('caste_masters');
            $table->unsignedBigInteger('partner_star')->nullable()->default(null);
            $table->foreign('partner_star')->references('id')->on('star_masters');
            $table->string('partner_rasi')->nullable()->default(null);
            // $table->foreign('partner_rasi')->references('id')->on('rasi_masters');
            $table->string('partner_country')->nullable()->default(null);
            // $table->foreign('partner_country')->references('id')->on('country_masters');
            $table->unsignedBigInteger('partner_state')->nullable()->default(null);
            $table->foreign('partner_state')->references('id')->on('state_masters');
            $table->unsignedBigInteger('partner_city')->nullable()->default(null);
            $table->foreign('partner_city')->references('id')->on('city_masters');
            $table->integer('caste_no_bar')->default(0)->nullable();
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
        Schema::dropIfExists('user_preference_infos');
    }
}
