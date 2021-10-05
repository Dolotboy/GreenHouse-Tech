<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Profile;
use Illuminate\Http\Request;

class AjouterProfilTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_AjouterProfil()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('POST','/api/new/profile/addProfile', [
            'email' => 'email',
            'password' => 'password',
            'firstName' => 'firstName',
            'lastName' => 'lastName'
        ]);


        $response->assertStatus(200);
    }
}
