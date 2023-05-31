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
        Schema::create('host_pricings', function (Blueprint $table) {
            $table->uuid('uuid')->primary()->unique();
            $table->uuid('host_id');
            $table->uuid('user_id');
            $table->uuid('pricing_id');
            $table->float('token');
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
        Schema::dropIfExists('host_pricings');
    }
};
