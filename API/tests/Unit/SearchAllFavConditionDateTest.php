<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionDate;

class SearchAllFavConditionDateTest extends TestCase
{
    public function test_SearchAllFavConditionDate()
    {
        $data = FavorableConditionDate::All();
        $donneApi = $this->json('GET', 'api/searchAll/condition/1');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
