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
            $table->id();
            $table->string('token');
            $table->timestamp('valid_until');
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
