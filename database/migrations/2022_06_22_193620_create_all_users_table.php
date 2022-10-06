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
        Schema::create('all_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('images');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->string('address');
            $table->string('document_type');
            $table->string('document');
            $table->boolean('document_verified');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('status');
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
        Schema::dropIfExists('all_users');
    }
};
