<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;
use Illuminate\Http\Request;


class AjouterPlantTest extends TestCase
{
    
    public function test_AjouterPlant()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('POST','/api/new/plant/addPlant', [
            'plantImg' => 'plantImg',
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
