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
        Schema::create('contest_winner_ranks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contest_id');
            $table->integer('from');
            $table->integer('to');
            $table->integer('prize_amount');
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
        Schema::dropIfExists('contest_winner_ranks');
    }
};
