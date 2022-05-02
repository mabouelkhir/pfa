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
        Schema::create('performance_projet', function (Blueprint $table) {
            $table->id();
            $table->integer('projet_id')->unsigned();
            $table->integer('performance_id')->unsigned();
            $table->foreign('projet_id')->references('id')->on('projets');
            $table->foreign('performance_id')->references('id')->on('performances');
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
        Schema::dropIfExists('performance_projet');
        
    }
};
