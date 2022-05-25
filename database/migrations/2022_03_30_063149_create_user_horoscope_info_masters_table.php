<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHoroscopeInfoMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_horoscope_info_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_jathakam_katam_info')->default('-')->nullable();
            $table->string('rasi_katam_row_1_col_1')->default(null)->nullable();
            $table->string('rasi_katam_row_1_col_2')->default(null)->nullable();
            $table->string('rasi_katam_row_1_col_3')->default(null)->nullable();
            $table->string('rasi_katam_row_1_col_4')->default(null)->nullable();
            $table->string('rasi_katam_row_2_col_1')->default(null)->nullable();
            $table->string('rasi_katam_row_2_col_4')->default(null)->nullable();
            $table->string('rasi_katam_row_3_col_1')->default(null)->nullable();
            $table->string('rasi_katam_row_3_col_4')->default(null)->nullable();
            $table->string('rasi_katam_row_4_col_1')->default(null)->nullable();
            $table->string('rasi_katam_row_4_col_2')->default(null)->nullable();
            $table->string('rasi_katam_row_4_col_3')->default(null)->nullable();
            $table->string('rasi_katam_row_4_col_4')->default(null)->nullable();
            $table->string('navam_katam_row_1_col_1')->default(null)->nullable();
            $table->string('navam_katam_row_1_col_2')->default(null)->nullable();
            $table->string('navam_katam_row_1_col_3')->default(null)->nullable();
            $table->string('navam_katam_row_1_col_4')->default(null)->nullable();
            $table->string('navam_katam_row_2_col_1')->default(null)->nullable();
            $table->string('navam_katam_row_2_col_4')->default(null)->nullable();
            $table->string('navam_katam_row_3_col_1')->default(null)->nullable();
            $table->string('navam_katam_row_3_col_4')->default(null)->nullable();
            $table->string('navam_katam_row_4_col_1')->default(null)->nullable();
            $table->string('navam_katam_row_4_col_2')->default(null)->nullable();
            $table->string('navam_katam_row_4_col_3')->default(null)->nullable();
            $table->string('navam_katam_row_4_col_4')->default(null)->nullable();
            $table->string('user_jathakam_image')->default(null)->nullable();
            $table->boolean('user_jathakam_rasi_katam_is_filled')->default(0)->nullable();
            $table->boolean('user_jathakam_navamsam_katam_is_filled')->default(0)->nullable();
            $table->boolean('user_jathakam_image_is_uploaded')->default(0)->nullable();
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
        Schema::dropIfExists('user_horoscope_info_masters');
    }
}
