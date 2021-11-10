<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Profile;
use Illuminate\Http\Request;
use Exception;

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

        //$data = Profile::find(2);     

        //dd($data);

        $response = $this->json('PUT','api/edit/profile/editProfile/2', [
            'email' => 'emailtest',
            'firstName' => 'first',
            'lastName' => 'last',
            'access' => 'access'
        ]);

        echo json_encode($response);

        //$data = Profile::find(6); 
        
        //$data->save();
        $response->assertStatus(200);

        /*$response = $this->json('PUT','/api/edit/profile/editProfile/6', [
            $data->email => 'email',
            $data->firstName => 'firstName',
            $data->lastName => 'lastName',
            $data->access => 'access'
        ]);*/

        // $data->save();
        // $response->assertStatus(200);
    }
}
