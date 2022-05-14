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
        Schema::create('qcms', function (Blueprint $table) {
            $table->id();
            $table->string('nom_qcm');
            $table->text('description');
            $table->integer('point_id')->unsigned();
            $table->foreign('point_id')->references('id')->on('points');
            $table->string('nom_performance');
            $table->string('statut')->default('non');
            $table->string('auteur');
            $table->text('amorce');
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
        Schema::dropIfExists('qcms');
    }
};
