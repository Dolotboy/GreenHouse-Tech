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

        $data = Profile::find(1);     

        $response = $this->json('PUT','/api/edit/profile/editProfile/1', [
            $data->email => 'emailEdit',
            $data->password => 'password',
            $data->firstName => 'firstName',
            $data->lastName => 'lastName',
            $data->access => 'access'
        ]);

        $response->assertStatus(200);

        $response = $this->json('PUT','/api/edit/profile/editProfile/1', [
            $data->email => 'email',
            $data->password => 'password',
            $data->firstName => 'firstName',
            $data->lastName => 'lastName',
            $data->access => 'access'
        ]);

        $response->assertStatus(200);
    }
}
