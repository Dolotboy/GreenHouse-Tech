<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile;
use Illuminate\Support\Facades\Http;

class ProfileTest extends TestCase
{
    public function test_Profile()
    {
        $data = Profile::find(1);
        $profile = new Profile();
        
        $profile->idProfile = $data->idProfile;
        $profile->email = $data->email;
        $profile->username = $data->username;
        $profile->firstName = $data->firstName;
        $profile->lastName = $data->lastName;
        $profile->created_at = $data->created_at;
        $profile->updated_at = $data->updated_at;

        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/search/profile/1');
        $profile_json = json_encode($profile);
        $this->assertEquals($profile_json,$donneApi);       
    }
}
