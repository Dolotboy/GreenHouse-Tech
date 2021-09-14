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
            $table->longText('imgPlant');
            $table->string('plantName');
            $table->string('season');
            $table->string('plantType');
            $table->string('groundType');
            $table->integer('daysConservation');
            $table->longText('functioning');
            $table->integer('tblPlantSowing_idSowing'); // Foreign à tblPlantSowing
            $table->timestamps();
        });

        Schema::create('tblPlantSowing', function (Blueprint $table) {
            $table->bigIncrements('idSowing');
            $table->date('dateSowing');
            $table->timestamps();
        });

        Schema::create('tblFruit', function (Blueprint $table) {
            $table->integer('tblPlant_idVegetable'); // Foreign à tblPlant
            $table->timestamps();
        });

        Schema::create('tblVegetable', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant'); // Foreign à tblPlant
            $table->timestamps();
        });

        Schema::create('tblPlant_tblProblem', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant'); // Foreign à tblPlant
            $table->integer('tblProblem_idProblem'); // Foreign à tblProblem
            $table->timestamps();
        });

        Schema::create('tblProblem', function (Blueprint $table) {
            $table->bigIncrements('idProblem');
            $table->string('typeProblem');
            $table->integer('importance');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('tblFavorites', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant'); // Foreign à tblPlant
            $table->integer('tblProfile_idProfile'); // Foreign à tblProfile
            $table->timestamps();
        });

        Schema::create('tblProfile', function (Blueprint $table) {
            $table->bigIncrements('idProfile');
            $table->string('email');
            $table->binary('password');
            $table->string('salt');
            $table->string('firstName');
            $table->string('lastName');
            $table->timestamps();
        });

        Schema::create('tblPlant_tblDateRangeFavorableCondition', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant');
            $table->integer('tblDateRangeFavorableCondition_idRangeDate');
            $table->timestamps();
        });

        Schema::create('tblDateRangeFavorableCondition', function (Blueprint $table) {
            $table->bigIncrements('idRangeDate');
            $table->string('rangeType');
            $table->date('begin');
            $table->date('end'); 
            $table->timestamps();
        });

        Schema::create('tblPlant_tblRangeFavorableConditionNb', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant');
            $table->integer('tblRangeFavorableConditionNb_idRangeNb');
            $table->timestamps();
        });

        Schema::create('tblRangeFavorableConditionNb', function (Blueprint $table) {
            $table->bigIncrements('idRangeNb');
            $table->string('rangeType');
            $table->double('min');
            $table->double('max'); 
            $table->string('unit'); 
            $table->timestamps();
        });

        /*Schema::create('', function (Blueprint $table) {
            $table->id('');
            $table->int('');
            $table->int('');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblPlant');
        Schema::dropIfExists('tblPlantSowing');
        Schema::dropIfExists('tblFruit');
        Schema::dropIfExists('tblVegetable');
        Schema::dropIfExists('tblPlant_tblProblem');
        Schema::dropIfExists('tblProblem');
        Schema::dropIfExists('tblFavorites');
        Schema::dropIfExists('tblProfile');
        Schema::dropIfExists('tblPlant_tblDateRangeFavorableCondition');
        Schema::dropIfExists('tblDateRangeFavorableCondition');
        Schema::dropIfExists('tblPlant_tblRangeFavorableConditionNb');
        Schema::dropIfExists('tblRangeFavorableConditionNb');
    }
}
