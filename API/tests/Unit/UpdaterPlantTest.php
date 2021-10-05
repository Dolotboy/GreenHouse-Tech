<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;
use Illuminate\Http\Request;

class UpdaterPlantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_UpdaterPlant()
    {
        $this->withoutExceptionHandling();

        $data = Plant::find(5);
        $dataEncode = json_encode($data);     

        $response = $this->json('PUT','/api/edit/plant/editPlant/5', [
            $dataEncode->plantName => 'plantNameEdit'
        ]);

        $response->assertStatus(200);
    }
}
