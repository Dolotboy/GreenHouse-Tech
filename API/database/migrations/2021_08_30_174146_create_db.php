<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDb extends Migration
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
            $table->string('plantName');
            $table->string('season');
            $table->string('plantType');
            $table->string('groundType');
            $table->integer('daysConservation');
            $table->longText('functioning');
            $table->integer('tblPlantSowing_idSowing'); // Foreign à tblPlantSowing
        });

        Schema::create('tblPlantSowing', function (Blueprint $table) {
            $table->bigIncrements('idSowing');
            $table->date('dateSowing');
        });

        Schema::create('tblFruit', function (Blueprint $table) {
            $table->integer('tblPlant_idVegetable'); // Foreign à tblPlant
        });

        Schema::create('tblVegetable', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant'); // Foreign à tblPlant
        });

        Schema::create('tblPlant_tblProblem', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant'); // Foreign à tblPlant
            $table->integer('tblProblem_idProblem'); // Foreign à tblProblem
        });

        Schema::create('tblProblem', function (Blueprint $table) {
            $table->bigIncrements('idProblem');
            $table->string('typeProblem');
            $table->integer('importance');
            $table->string('description');
        });

        Schema::create('tblFavorites', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant'); // Foreign à tblPlant
            $table->integer('tblProfile_idProfile'); // Foreign à tblProfile
        });

        Schema::create('tblProfile', function (Blueprint $table) {
            $table->bigIncrements('idProfile');
            $table->string('email');
            $table->binary('password');
            $table->string('salt');
            $table->string('firstName');
            $table->string('lastName');
        });

        Schema::create('tblDateRangeFavorableCondition', function (Blueprint $table) {
            $table->bigIncrements('idRangeDate');
            $table->string('variableEvalue');
            $table->date('begin');
            $table->date('end'); 
        });

        Schema::create('tblPlant_tblDateRangeFavorableConditionNb', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant');
            $table->integer('tblDateRangeFavorableCondition_idRangeNb');
        });

        Schema::create('tblRangeFavorableConditionNb', function (Blueprint $table) {
            $table->bigIncrements('idRangeNb');
            $table->string('rangeType');
            $table->double('min');
            $table->double('max'); 
            $table->string('unite'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db');
    }
}
