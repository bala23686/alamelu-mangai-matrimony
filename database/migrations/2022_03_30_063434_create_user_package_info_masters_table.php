<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackageInfoMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_package_info_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_package_id')->nullable()->default(null);
            $table->foreign('user_package_id')->references('id')->on('package_masters');
            $table->integer('user_views_remaining')->default(1)->nullable();
            $table->integer('photo_upload_remaining')->default(1)->nullable();
            $table->integer('interest_remaining')->default()->nullable();
            $table->timestamp('expires_on')->nullable()->useCurrent();
            $table->boolean('is_expired')->default(0)->comment('0 means Active 1 means expired')->nullable();
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
        Schema::dropIfExists('user_package_info_masters');
    }
}
