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

<<<<<<< HEAD
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

=======
>>>>>>> 3be329b9788186ec9dcd509bd7b7a979bda0aff5
        Schema::create('tblProblem', function (Blueprint $table) {
            $table->bigIncrements('idProblem');
            $table->string('typeProblem');
            $table->integer('importanceLvl');
            $table->string('description');
            $table->timestamps();
        });

<<<<<<< HEAD
        Schema::create('tblFavorites', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant'); // Foreign à tblPlant
            $table->integer('tblProfile_idProfile'); // Foreign à tblProfile
=======
        Schema::create('tblPlant_tblProblem', function (Blueprint $table) {
            $table->unsignedBigInteger('tblPlant_idPlant');
            $table->foreign('tblPlant_idPlant')->references('idPlant')->on('tblPlant'); // Foreign à tblPlant
            $table->unsignedBigInteger('tblProblem_idProblem');
            $table->foreign('tblProblem_idProblem')->references('idProblem')->on('tblProblem'); // Foreign à tblProblem
            $table->timestamps();
>>>>>>> 3be329b9788186ec9dcd509bd7b7a979bda0aff5
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

<<<<<<< HEAD
        Schema::create('tblDateRangeFavorableCondition', function (Blueprint $table) {
=======
        Schema::create('tblDateRangeFav', function (Blueprint $table) {
>>>>>>> 3be329b9788186ec9dcd509bd7b7a979bda0aff5
            $table->bigIncrements('idRangeDate');
            $table->string('rangeType');
            $table->date('begin');
            $table->date('end'); 
            $table->timestamps();
        });

<<<<<<< HEAD
        Schema::create('tblPlant_tblDateRangeFavorableConditionNb', function (Blueprint $table) {
            $table->integer('tblPlant_idPlant');
            $table->integer('tblDateRangeFavorableCondition_idRangeNb');
        });

        Schema::create('tblRangeFavorableConditionNb', function (Blueprint $table) {
=======
        Schema::create('tblNbRangeFav', function (Blueprint $table) {
>>>>>>> 3be329b9788186ec9dcd509bd7b7a979bda0aff5
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
