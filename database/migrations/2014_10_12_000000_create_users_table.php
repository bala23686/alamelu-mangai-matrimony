<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phonenumber')->unique();
            $table->string('password');
            $table->string('user_profile_id')->default(null)->nullable();
            $table->unsignedBigInteger('profile_status_id')->nullable()->default(1);
            $table->foreign('profile_status_id')->references('id')->on('status_masters');
            $table->boolean('is_admin')->default(0)->nullable();
            $table->boolean('is_verified')->default(0)->comment('0 -Not Verified 1- Verified');
            $table->boolean('is_paid')->default(0)->comment('0 -Not-Paid 1-Paid');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
