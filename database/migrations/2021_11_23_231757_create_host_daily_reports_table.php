<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_daily_reports', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->uuid('host_id');
            $table->integer('total_calls');
            $table->integer('total_accepted_calls');
            $table->integer('call_coin');
            $table->integer('gift_coin');
            $table->integer('total_coin');
            $table->integer('deducted_coin')->default(0);
            $table->string('answer_rate');
            $table->string('total_duration');
            $table->string('final_coin');
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
        Schema::dropIfExists('host_daily_reports');
    }
}
