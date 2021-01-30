<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateCityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_state', function (Blueprint $table) {
            $table->increment('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('demo_state', function (Blueprint $table) {
            $table->increment('id');
            $table->integer('state_id');
            $table->string('name');
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
        Schema::drop('demo_cities');
        Schema::drop('demo_state');
    }
}
