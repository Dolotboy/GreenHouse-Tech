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

        $data = Profil::find(5);
        $dataEncode = json_encode($data);     

        $response = $this->json('PUT','/api/edit/profile/editProfile/5', [
            $dataEncode->email => 'emailEdit'
        ]);

        $response->assertStatus(200);
    }
}
