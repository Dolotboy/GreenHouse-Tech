<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFamily', function (Blueprint $table) {
            $table->bigIncrements('idFamily');
            $table->longText('familyName');
            $table->timestamps();
        });

        Schema::table('tblFamily', function (Blueprint $table) {
            $table->unique('familyName');
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
