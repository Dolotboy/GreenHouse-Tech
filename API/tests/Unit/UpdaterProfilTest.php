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
        $this->withoutExceptionHandling();

        $data = Profile::find(25);     

        $response = $this->json('PUT','/api/edit/profile/editProfile/25', [
            $data->email => 'emailEdit',
            'password' => 'password',
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'access' => 'access'
        ]);

        $response->assertStatus(200);

        $response = $this->json('PUT','/api/edit/profile/editProfile/25', [
            $data->email => 'email',
            'password' => 'password',
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'access' => 'access'
        ]);

        $response->assertStatus(200);
    }
}
