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
        Schema::create('host_favourites', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->primary();
            $table->uuid('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->uuid('host_id')->nullable();
            $table->uuid('host_user_id')->nullable();
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
        Schema::dropIfExists('host_favourites');
    }
};
