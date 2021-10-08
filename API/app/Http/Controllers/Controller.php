<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Version;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function incrementVersion()
    {
        $version = json_decode($this->searchLastVersion());

        $newVersion = new Version();
        $newVersion->numVersion = $version->numVersion + 0.1;

        $newVersion->save();

        return ("Version mise à jour !");
    }

    public function searchLastVersion()
    {
        $version = Version::orderBy('idVersion', 'DESC')->get();

        $json = json_encode($version[0], JSON_NUMERIC_CHECK);

        return $json;
    }

    public function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function comparePassword($password, $hash){
        if(password_verify($password, $hash))
            return 1;
        return 0;
    }
}
