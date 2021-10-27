<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NoDoublons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblPlant_tblProblem', function (Blueprint $table) {
            $table->primary(['tblPlant_idPlant','tblProblem_idProblem'], 'primaryProblem');
        });

        Schema::table('tblPlant_tblRangeDate', function (Blueprint $table) {
            $table->primary(['tblPlant_idPlant','tblRangeDate_idRangeDate'], 'primaryRangeDate');
        });

        Schema::table('tblPlant_tblRangeNb', function (Blueprint $table) {
            $table->primary(['tblPlant_idPlant','tblRangeNb_idRangeNb'], 'primaryRangeNb');
        });

        Schema::table('tblFavorites', function (Blueprint $table) {
            $table->primary(['tblPlant_idPlant','tblProfile_idProfile'], 'primaryFav');
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
