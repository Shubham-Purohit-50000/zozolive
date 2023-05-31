<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_logs', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->uuid('user_id');
            $table->uuid('host_id');
            $table->time('duration')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->string('call_coin')->nullable();
            $table->string('gift_coin')->nullable();
            $table->smallInteger('call_status')->default(0);
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
        Schema::dropIfExists('call_logs');
    }
}
