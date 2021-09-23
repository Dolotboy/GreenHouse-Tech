<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionNb;

class SearchAllFavConditionNBTest extends TestCase
{
    public function test_SearchAllFavConditionNB()
    {
        $data = FavorableConditionNB::All();
        $donneApi = $this->json('GET', 'api/searchAll/condition/2');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
