<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Profile;
use Illuminate\Http\Request;

class UpdaterProfilTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_UpdaterProfile()
    {

        $data = Profile::find(7);     

        $response = $this->json('PUT','/api/edit/profile/editProfile/7', [
            $data->email => 'emailEdit',
            $data->password => 'password',
            $data->firstName => 'firstName',
            $data->lastName => 'lastName',
            $data->access => 'access'
        ]);
        
        $data->save();
        $response->assertStatus(200);

        $response = $this->json('PUT','/api/edit/profile/editProfile/7', [
            $data->email => 'email',
            $data->password => 'password',
            $data->firstName => 'firstName',
            $data->lastName => 'lastName',
            $data->access => 'access'
        ]);

        $data->save();
        $response->assertStatus(200);
    }
}
