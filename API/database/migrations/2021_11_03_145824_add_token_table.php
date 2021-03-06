<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblTokens', function (Blueprint $table) {
            $table->bigIncrements('idToken');
            $table->string('token');
            $table->date('valid_until');
            $table->unsignedBigInteger('idProfile');
            $table->foreign('idProfile')->references('idProfile')->on('tblProfile');
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
