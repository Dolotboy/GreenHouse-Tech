<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Profile()
    {
        $this->withoutExceptionHandling();

        $data = Profile::find(1);
        $dataEncode = json_encode($data);
        //$donneApi = Http::get('http://127.0.0.1:8000/api/search/profile/1');

        $donneApi = file_get_contents("http://127.0.0.1:8000/api/search/profile/1");
        $donneApiJson = json_decode($donneApi);

        //dd($data);    

        $this->assertTrue(
            ($data->idProfile == $donneApiJson->idProfile ) &&
            $data->email == $donneApiJson->email &&
            $data->username == $donneApiJson->username &&
            $data->firstName == $donneApiJson->firstName &&
            $data->lastName == $donneApiJson->lastName  
        );
    }
}
