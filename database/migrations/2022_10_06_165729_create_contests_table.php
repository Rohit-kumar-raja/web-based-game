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
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mathche_id');
            $table->double('total_price');
            $table->string('no_of_participate');
            $table->integer('no_of_winnners');
            $table->integer('percentage_of_winners');
            $table->integer('participate_amount');
            $table->integer('no_scratch_card_in_one');
            $table->boolean('status');
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
        Schema::dropIfExists('contests');
    }
};
