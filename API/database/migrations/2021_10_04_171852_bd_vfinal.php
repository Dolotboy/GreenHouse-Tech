<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BdVfinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblPlant', function (Blueprint $table) {
            $table->dropColumn('equipment');
            $table->dropColumn('tblPlantSowing_idSowing');
            $table->renameColumn('season', 'plantSeason');
            $table->renameColumn('groundType', 'plantGroundType');
            $table->renameColumn('daysConservation', 'plantDaysConservation');
            $table->renameColumn('description', 'plantDescription');
            $table->renameColumn('difficulty', 'plantDifficulty');
            $table->renameColumn('bestNeighbor', 'plantBestNeighbor');
        });

        Schema::table('tblProblem', function (Blueprint $table) {
            $table->dropColumn('imgProblem');
            $table->renameColumn('description', 'problemSolution');
            $table->renameColumn('typeProblem', 'problemType');
        });

        Schema::rename('tblDateRangeFav', 'tblRangeDate');

        Schema::rename('tblNbRangeFav', 'tblRangeNb');

        Schema::rename('tblPlant_tblDateRangeFav', 'tblPlant_tblRangeDate');

        Schema::rename('tblPlant_tblNbRangeFav', 'tblPlant_tblRangeNb');

        Schema::table('tblRangeDate', function (Blueprint $table) {
            $table->renameColumn('rangeType', 'type');
            $table->renameColumn('begin', 'start');
        });

        Schema::table('tblRangeNb', function (Blueprint $table) {
            $table->renameColumn('rangeType', 'type');
        });

        Schema::dropIfExists('tblPlantSowing');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
