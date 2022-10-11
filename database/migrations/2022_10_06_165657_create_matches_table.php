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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('name');
            $table->string('teamone');
            $table->string('teamtwo');
            $table->string('teamoneimg');
            $table->string('teamtwoimg'); 
            $table->string('date');
            $table->string('time');
            $table->string('vanue');
            $table->longText('api');
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
        Schema::dropIfExists('matches');
    }
};
