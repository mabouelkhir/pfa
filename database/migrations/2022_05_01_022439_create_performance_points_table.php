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
        Schema::create('performance_point', function (Blueprint $table) {
            $table->id();
            $table->integer('point_id')->unsigned();
            $table->integer('performance_id')->unsigned();
            $table->foreign('point_id')->references('id')->on('points');
            $table->foreign('performance_id')->references('id')->on('performances');
            $table->string('statut')->default('non');
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
        Schema::dropIfExists('performance_point');
    }
};
