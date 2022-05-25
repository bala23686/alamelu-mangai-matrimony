<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_masters', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('package_allowed_profile');
            $table->integer('package_photo_upload')->nullable()->default(null);
            $table->integer('package_valid_for')->nullable()->default(null);
            $table->integer('package_interest_allowed')->nullable()->default(null);
            $table->integer('package_price')->nullable()->default(null);
            $table->boolean('package_status')->default(true);
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
        Schema::dropIfExists('package_masters');
    }
}
