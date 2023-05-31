<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->uuid('user_id');
            $table->string('amount');
            $table->string('amount_paid')->nullable();
            $table->string('amount_due')->nullable();
            $table->uuid('coin_id')->nullable();
            $table->integer('coin')->nullable();
            $table->string('status')->nullable();
            $table->string('receipt')->nullable();
            $table->string('currency')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payment_gateway')->nullable();
            $table->string('razorpay_payment_id')->nullable(); 
            $table->string('razorpay_order_id')->nullable(); 
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
        Schema::dropIfExists('recharges');
    }
}
