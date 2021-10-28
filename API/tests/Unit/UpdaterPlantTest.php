<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;
use Illuminate\Http\Request;
use Exception;


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

        $data = Plant::find(25);

        $response = $this->json('PUT','/api/edit/plant/editPlant/25', [
            $data->plantImg => 'plantImgEdit',
            'plantName' => 'plantName',
            'plantType' => 'plantType',
            'plantFamily' => 'plantFamily',
            'plantSeason' => 'plantSeason',
            'plantGroundType' => 'plantGroundType',
            'plantDaysConservation' => '1',
            'plantDescription' => 'plantDescription',
            'plantDifficulty' => '1',
            'plantBestNeighbor' => 'plantBestNeighbor'
        ]);

        $response->assertStatus(200);

        $response = $this->json('PUT','/api/edit/plant/editPlant/25', [
            $data->plantImg => 'plantImg',
            'plantName' => 'plantName',
            'plantType' => 'plantType',
            'plantFamily' => 'plantFamily',
            'plantSeason' => 'plantSeason',
            'plantGroundType' => 'plantGroundType',
            'plantDaysConservation' => '1',
            'plantDescription' => 'plantDescription',
            'plantDifficulty' => '1',
            'plantBestNeighbor' => 'plantBestNeighbor'
        ]);

        $response->assertStatus(200);
    }
}
