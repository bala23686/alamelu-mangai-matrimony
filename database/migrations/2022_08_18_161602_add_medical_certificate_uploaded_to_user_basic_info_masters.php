<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedicalCertificateUploadedToUserBasicInfoMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_basic_info_masters', function (Blueprint $table) {
            $table->boolean('medical_certificate_uploaded')->default(0)->comment('0 not uploaded 1 means uploaded');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_basic_info_masters', function (Blueprint $table) {
            //
        });
    }
}
