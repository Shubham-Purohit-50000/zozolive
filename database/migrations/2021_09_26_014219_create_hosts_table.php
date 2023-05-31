<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->uuid('user_id');
            $table->uuid('studio_id')->nullable();
            $table->string('video')->nullable();
            $table->smallInteger('interested_in')->nullable();
            $table->uuid('language_id')->nullable();
            $table->uuid('specific_id')->nullable();
            $table->uuid('subculture_id')->nullable();
            $table->text('about_me')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_issuing_country')->nullable();
            $table->uuid('country_id')->nullable();
            $table->uuid('state_id')->nullable();
            $table->text('address')->nullable();
            $table->string('id_photo')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('hosts');
    }
}
