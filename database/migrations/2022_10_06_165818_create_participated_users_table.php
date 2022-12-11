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
        Schema::create('participated_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('matche_id');
            $table->unsignedBigInteger('contest_id');
            $table->unsignedBigInteger('wallet_id');
            $table->string('player');
            $table->string('scratch');
            $table->integer('total_run')->nullable();
            $table->integer('winnig_amount')->nullable();
            $table->integer('participate_amount');
            $table->boolean('status');
            $table->foreign('user_id')->references('id')->on('all_users');
            $table->foreign('matche_id')->references('id')->on('matches');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('wallet_id')->references('id')->on('wallets');
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
        Schema::dropIfExists('participated_users');
    }
};
