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
        Schema::create('tblVegetal', function (Blueprint $table) {
            $table->bigIncrements('idVegetal');
            $table->string('nomVegetal');
            $table->string('saison');
            $table->string('typeVegetal');
            $table->string('typeSol');
            $table->integer('joursConservation');
            $table->longText('fonctionnement');
            $table->integer('tblConditionFavorable_idConditionFavorable'); // Foreign à tblConditionFavorable
            $table->integer('tblVegetalSemi_idSemi'); // Foreign à tblVegetalSemi
        });

        Schema::create('tblVegetalSemi', function (Blueprint $table) {
            $table->bigIncrements('idSemi');
            $table->date('dateSemi');
        });

        Schema::create('tblFruit', function (Blueprint $table) {
            $table->integer('tblVegetal_idVegetal'); // Foreign à tblVegetal
        });

        Schema::create('tblLegume', function (Blueprint $table) {
            $table->integer('tblVegetal_idVegetal'); // Foreign à tblVegetal
        });

        Schema::create('tblVegetale_tblProbleme', function (Blueprint $table) {
            $table->integer('tblVegetale_idVegetal'); // Foreign à tblVegetal
            $table->integer('tblProbleme_idProbleme'); // Foreign à tblProbleme
        });

        Schema::create('tblProbleme', function (Blueprint $table) {
            $table->bigIncrements('idProbleme');
            $table->string('typeProbleme');
            $table->integer('importance');
            $table->string('description');
        });

        Schema::create('tblFavoris', function (Blueprint $table) {
            $table->integer('tblVegetale_idVegetal'); // Foreign à tblVegetal
            $table->integer('tblProfil_idProfil'); // Foreign à tblProfil
        });

        Schema::create('tblProfil', function (Blueprint $table) {
            $table->bigIncrements('idProfil');
            $table->string('email');
            $table->binary('mdp');
            $table->string('sel');
            $table->string('prenom');
            $table->string('nom');
        });

        Schema::create('tblVegetal_tblConditionFavorableRangeDate', function (Blueprint $table) {
            $table->integer('tblVegetal_idVegetal');
            $table->integer('tblConditionFavorableRangeDate_idRangeDate');
        });

        Schema::create('tblConditionFavorableRangeDate', function (Blueprint $table) {
            $table->bigIncrements('idRangeDate');
            $table->string('variableEvalue');
            $table->date('debut');
            $table->date('fin'); 
        });

        Schema::create('tblVegetal_tblConditionFavorableRangeNb', function (Blueprint $table) {
            $table->integer('tblVegetal_idVegetal');
            $table->integer('tblConditionFavorableRangeDate_idRangeNb');
        });

        Schema::create('tblConditionFavorableRangeNb', function (Blueprint $table) {
            $table->bigIncrements('idRangeNb');
            $table->string('variableEvalue');
            $table->double('min');
            $table->double('max'); 
            $table->string('unite'); 
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
        Schema::dropIfExists('db');
    }
}
