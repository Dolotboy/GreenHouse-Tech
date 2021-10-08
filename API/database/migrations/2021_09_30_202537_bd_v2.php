<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblPlant', function (Blueprint $table) {
            $table->string('plantState');
            $table->string('equipment');
            $table->integer('difficulty');
            $table->string('lifeTime');
            $table->string('bestNeighbor');
            $table->timestamps();
        });

        Schema::table('tblProblem', function (Blueprint $table) {
            $table->string('imgProblem');
        });

        Schema::table('tblProfile', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->string('access');
        });

        Schema::table('tblDateRangeFav', function (Blueprint $table) {
            $table->string('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
