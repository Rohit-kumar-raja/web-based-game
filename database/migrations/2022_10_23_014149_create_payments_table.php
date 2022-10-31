<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidπ
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 30)->nullable();
            $table->string('module_table_name', 30)->nullable();
            $table->string('module_table_Id', 30)->nullable();
            $table->string('order_id', 60)->nullable();
            $table->string('payment_amount', 30)->nullable();
            $table->string('payment_type', 30)->nullable();
            $table->string('payment_date', 30)->nullable();
            $table->string('txn_id', 30)->nullable();
            $table->string('client_txn_id', 30)->nullable();
            $table->string('status', 30)->nullable();
            $table->string('error', 200)->nullable();
            $table->longText('response')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
