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
        Schema::create('tblPlant', function (Blueprint $table) {
            $table->bigIncrements('idPlant');
            $table->longText('imgPlant');
            $table->string('plantName');
            $table->string('plantType');
            $table->string('plantFamily');
            $table->string('season');
            $table->string('groundType');
            $table->integer('daysConservation');
            $table->longText('description');
            $table->integer('tblPlantSowing_idSowing'); // Foreign à tblPlantSowing
            $table->string('plantState');
            $table->string('equipment');
            $table->integer('difficulty');
            $table->string('lifeTime');
            $table->string('bestNeighbor');
            $table->timestamps();
        });

        Schema::create('tblProblem', function (Blueprint $table) {
            $table->bigIncrements('idProblem');
            $table->string('imgProblem');
            $table->string('typeProblem');
            $table->integer('importanceLvl');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('tblProfile', function (Blueprint $table) {
            $table->bigIncrements('idProfile');
            $table->string('email');
            $table->binary('password');
            $table->string('salt');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('access');
            $table->timestamps();
        });

        Schema::create('tblDateRangeFav', function (Blueprint $table) {
            $table->bigIncrements('idRangeDate');
            $table->string('rangeType');
            $table->date('begin');
            $table->date('end'); 
            $table->string('location');
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
        //
    }
}
