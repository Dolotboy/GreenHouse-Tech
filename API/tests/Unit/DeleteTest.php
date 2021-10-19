<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableConditionDate;
use App\Models\FavorableConditionNb;
use App\Models\Favorite;
use App\Models\Profile;

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
    public function test_deleteProblem()

    {
        $problem = new Problem();

        $problem->problemType = "pogo";
        $problem->problemSolution = "pogo";
        $problem->created_at = "2021-10-07 19:43:14";
        $problem->updated_at = "2021-10-07 19:43:14";
        $problem->problemName = "pogo";
        
        $problem->save();

        $id=$problem->idProblem;
        

        $this->delete("/api/delete/problem/".$id);

        $this->get('/api/search/problem/'.$id)->assertStatus(404);

    }
    public function test_deleteCondDate()

    {
        $conditionDate = new FavorableConditionDate();

        $conditionDate->type = "pogo";
        $conditionDate->start = "2021-12-31";
        $conditionDate->end = "2021-12-31";
        $conditionDate->created_at = "2021-10-07 19:43:14";
        $conditionDate->updated_at = "2021-10-07 19:43:14";
        $conditionDate->location = "pogo";
        
        $conditionDate->save();

        $id=$conditionDate->idRangeDate;
        

        $this->delete("/api/delete/condition/1/".$id);

        $this->get('/api/search/condition/1/'.$id)->assertStatus(404);

    }
    public function test_deleteCondNb()

    {
        $conditionNb = new FavorableConditionNb();

        $conditionNb->type = "pogo";
        $conditionNb->min = 3;
        $conditionNb->max = 1;
        $conditionNb->unit = "pogo";
        $conditionNb->created_at = "2021-10-07 19:43:14";
        $conditionNb->updated_at = "2021-10-07 19:43:14";
        
        $conditionNb->save();

        $id=$conditionNb->idRangeNb;
        

        $this->delete("/api/delete/condition/2/".$id);

        $this->get('/api/search/condition/2/'.$id)->assertStatus(404);

    }
    public function test_deleteFavorite()

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

        $idPlant=$plant->idPlant;

        $profile = new Profile();

        $profile->email = "pogo";
        $profile->password = "pogo";
        $profile->salt = "pogo";
        $profile->firstName = "pogo";
        $profile->lastName = "pogo";
        $profile->created_at = "2021-10-07 19:43:14";
        $profile->updated_at = "2021-10-07 19:43:14";
        $profile->access = "pogo";
        
        $profile->save();

        $idProfile=$profile->idProfile;

        $favorite = new Favorite();

        $favorite->tblPlant_idPlant = $idPlant;
        $favorite->tblProfile_idProfile = $idProfile;
        $favorite->created_at = "2021-10-07 19:43:14";
        $favorite->updated_at = "2021-10-07 19:43:14";
        
        $favorite->save();

        $this->delete("/api/delete/favorite/".$idPlant."/".$idProfile)->assertStatus(200);

    }
    public function test_deleteProfile()

    {
        $profile = new Profile();

        $profile->email = "pogo";
        $profile->password = "pogo";
        $profile->salt = "pogo";
        $profile->firstName = "pogo";
        $profile->lastName = "pogo";
        $profile->created_at = "2021-10-07 19:43:14";
        $profile->updated_at = "2021-10-07 19:43:14";
        $profile->access = "pogo";
        
        $profile->save();

        $id=$profile->idProfile;
        

        $this->delete("/api/delete/profile/".$id)->assertStatus(200);

        $this->get('/api/search/profile/'.$id)->assertStatus(404);

    }

}
