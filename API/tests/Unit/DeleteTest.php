<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

use Illuminate\Support\Facades\Http;

use App\Models\Plant;

class DeleteTest extends TestCase
{
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_deletePlant()

    {
        $plant = new Plant();

        $plant->plantImg = "pogo";
        $plant->plantName = "pogo";
        $plant->plantType = "pogo";
        $plant->plantFamily = "pogo";
        $plant->plantSeason = "pogo";
        $plant->plantGroundType = "pogo";
        $plant->plantDaysConservation = 3;
        $plant->plantDescription = "pogo";
        $plant->plantDifficulty = 1;
        $plant->plantBestNeighbor = "pogo";
        $plant->created_at = "2021-10-07 19:43:14";
        $plant->updated_at = "2021-10-07 19:43:14";
        
        $plant->save();

        $id=$plant->idPlant;
        

        $this->delete("/api/delete/plant/".$id);

        $this->get('/api/search/plant/'.$id)->assertStatus(404);

    }
    
}
