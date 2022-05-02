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
        Schema::table('chapitres', function (Blueprint $table) {
            $table->integer('projet_id')->unsigned()->after('id');
            $table->foreign('projet_id')->references('id')->on('projets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapitres', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
            $table->dropColumn(['projet_id']);
        });
    }
};
