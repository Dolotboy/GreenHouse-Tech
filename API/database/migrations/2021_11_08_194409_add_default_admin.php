<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Profile;

class AddDefaultAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $password = password_hash("PcstAdmin2021" . "salt", PASSWORD_DEFAULT);
        $profile = new Profile();
        $profile->email = "admin@pcst.xyz";
        $profile->lastName = "Dolotboy";
        $profile->firstName = "Max";
        $profile->salt = "salt";
        $profile->password = $password;
        $profile->access = "admin";
        $profile->save();
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
