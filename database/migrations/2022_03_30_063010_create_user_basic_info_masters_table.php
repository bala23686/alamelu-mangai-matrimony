<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBasicInfoMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_basic_info_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_full_name');
            $table->string('user_mobile_no');
            $table->string('user_profile_image')->default(null)->nullable();
            $table->date('dob');
            $table->string('blood_group')->default(null)->nullable();
            $table->string('about', 255)->default(null)->nullable();
            $table->string('user_address', 255)->default(null)->nullable();
            $table->integer('age')->nullable();
            $table->boolean('is_tenth_passed')->default(0);
            $table->string('adhard_card_no')->default(null)->nullable();
            $table->string('adhard_card_image')->default(null)->nullable();
            $table->boolean('adhard_card_image_is_uploaded')->default(0)->comment('0 not uploaded 1 means uploaded');
            $table->string('medical_certificate')->default(null)->nullable();
            $table->boolean('medical_certificate_uploaded')->default(0)->comment('0 not uploaded 1 means uploaded');
            $table->string('tenth_marksheet')->nullable()->default(null);
            $table->boolean('tenth_mark_sheet_uploaded')->default(0);
            $table->string('twelth_marksheet')->nullable()->default(null);
            $table->boolean('twelth_mark_sheet_uploaded')->default(0);
            $table->string('clg_tc')->nullable()->default(null);
            $table->boolean('clg_tc_is_uploaded')->default(0);
            $table->unsignedBigInteger('gender_id')->nullable()->default(null);
            $table->foreign('gender_id')->references('id')->on('gender_masters');
            $table->unsignedBigInteger('user_height_id')->nullable()->default(null);
            $table->foreign('user_height_id')->references('id')->on('height_masters');
            $table->unsignedBigInteger('user_mother_tongue')->nullable()->default(null);
            $table->foreign('user_mother_tongue')->references('id')->on('language_masters');
            $table->unsignedBigInteger('martial_id')->nullable()->default(null);
            $table->foreign('martial_id')->references('id')->on('martial_status_sub_masters');
            $table->unsignedBigInteger('user_eating_habit_id')->nullable()->default(null);
            $table->foreign('user_eating_habit_id')->references('id')->on('eating_habit_sub_masters');
            $table->unsignedBigInteger('user_complexion_id')->nullable()->default(null);
            $table->foreign('user_complexion_id')->references('id')->on('complexion_sub_masters');
            $table->boolean('is_disable')->nullable()->default(null);
            $table->boolean('profile_basic_status')->default('0');
            $table->boolean('profile_religion_status')->default('0');
            $table->boolean('profile_location_status')->default('0');
            $table->boolean('profile_pro_info_status')->default('0');
            $table->boolean('profile_fam_info_status')->default('0');
            $table->boolean('profile_jakt_info_status')->default('0');
            $table->boolean('profile_pref_info_status')->default('0');
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
        Schema::dropIfExists('user_basic_info_masters');
    }
}
