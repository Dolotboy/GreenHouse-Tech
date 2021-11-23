<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Family;

class DefaultFamily extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        $family = new Family();
        $family->familyName = "Cucurbitacée";
        $family->save();
        $family = new Family();
        $family->familyName = "Rosacée";
        $family->save();
        $family = new Family();
        $family->familyName = "Solonacée";
        $family->save();
        $family = new Family();
        $family->familyName = "Poacée";
        $family->save();
        $family = new Family();
        $family->familyName = "Chénopodiacée";
        $family->save();
        $family = new Family();
        $family->familyName = "Brassicaceae";
        $family->save();
        $family = new Family();
        $family->familyName = "Fabaceae";
        $family->save();
        $family = new Family();
        $family->familyName = "Liliaceae";
        $family->save();
        $family = new Family();
        $family->familyName = "Asteraceae";
        $family->save();
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
