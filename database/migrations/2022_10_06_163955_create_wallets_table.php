<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->double('debit')->nullable();
            $table->double('credit')->nullable();
            $table->double('balance')->nullable();
            $table->string('withdraw_status')->nullable();
            $table->longText('api_info')->nullable();
            $table->boolean('status')->nullable();
            $table->foreign('user_id')->references('id')->on('all_users');
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
        Schema::dropIfExists('wallets');
    }
};
