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
            $table->string('plantType');
            $table->string('plantFamily');
            $table->string('season');
            $table->string('groundType');
            $table->integer('daysConservation');
            $table->longText('description');
            $table->integer('tblPlantSowing_idSowing'); // Foreign à tblPlantSowing
            $table->timestamps();
        });

        Schema::create('tblPlantSowing', function (Blueprint $table) {
            $table->bigIncrements('idSowing');
            $table->date('dateSowing');
            $table->timestamps();
        });

        Schema::create('tblProblem', function (Blueprint $table) {
            $table->bigIncrements('idProblem');
            $table->string('typeProblem');
            $table->integer('importanceLvl');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('tblPlant_tblProblem', function (Blueprint $table) {
            $table->unsignedBigInteger('tblPlant_idPlant');
            $table->foreign('tblPlant_idPlant')->references('idPlant')->on('tblPlant'); // Foreign à tblPlant
            $table->unsignedBigInteger('tblProblem_idProblem');
            $table->foreign('tblProblem_idProblem')->references('idProblem')->on('tblProblem'); // Foreign à tblProblem
            $table->timestamps();
        });

        Schema::create('tblProfile', function (Blueprint $table) {
            $table->bigIncrements('idProfile');
            $table->string('email');
            $table->binary('password');
            $table->string('salt');
            $table->string('username');
            $table->string('firstName');
            $table->string('lastName');
            $table->timestamps();
        });

        Schema::create('tblDateRangeFav', function (Blueprint $table) {
            $table->bigIncrements('idRangeDate');
            $table->string('rangeType');
            $table->date('begin');
            $table->date('end'); 
            $table->timestamps();
        });

        Schema::create('tblNbRangeFav', function (Blueprint $table) {
            $table->bigIncrements('idRangeNb');
            $table->string('rangeType');
            $table->double('min');
            $table->double('max'); 
            $table->string('unit'); 
            $table->timestamps();
        });

        Schema::create('tblFavorites', function (Blueprint $table) {
            $table->unsignedBigInteger('tblPlant_idPlant');
            $table->foreign('tblPlant_idPlant')->references('idPlant')->on('tblPlant'); // Foreign à tblPlant
            $table->unsignedBigInteger('tblProfile_idProfile');
            $table->foreign('tblProfile_idProfile')->references('idProfile')->on('tblProfile'); // Foreign à tblProfile
            $table->timestamps();
        });

        Schema::create('tblPlant_tblDateRangeFav', function (Blueprint $table) {
            $table->unsignedBigInteger('tblPlant_idPlant');
            $table->foreign('tblPlant_idPlant')->references('idPlant')->on('tblPlant'); // Foreign
            $table->unsignedBigInteger('tblDateRangeFav_idRangeDate');
            $table->foreign('tblDateRangeFav_idRangeDate')->references('idRangeDate')->on('tblDateRangeFav'); // Foreign
            $table->timestamps();
        });

        Schema::create('tblPlant_tblNbRangeFav', function (Blueprint $table) {
            $table->unsignedBigInteger('tblPlant_idPlant');
            $table->foreign('tblPlant_idPlant')->references('idPlant')->on('tblPlant'); // Foreign
            $table->unsignedBigInteger('tblNbRangeFav_idRangeNb');
            $table->foreign('tblNbRangeFav_idRangeNb')->references('idRangeNb')->on('tblNbRangeFav'); // Foreign
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