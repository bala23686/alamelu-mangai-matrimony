<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tr_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('tr_package_name')->nullable()->default(null);
            $table->string('tr_package_price')->nullable()->default(null);
            $table->string('tr_amount_paid')->nullable()->default(null);
            $table->string('tr_package_views')->nullable()->default(null);
            $table->string('tr_package_photo_upload')->nullable()->default(null);
            $table->string('tr_package_interest')->nullable()->default(null);
            $table->string('tr_mode')->nullable()->default(null);
            $table->string('tr_invoice_pdf')->nullable()->default(null);
            $table->date('tr_date')->nullable()->useCurrent();
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
        Schema::dropIfExists('user_transactions');
    }
}
