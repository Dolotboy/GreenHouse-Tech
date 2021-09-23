<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionDate;

class ConditionDateTest extends TestCase
{
    
    public function test_conditionDate()
    {
        $data = FavorableConditionDate::find(1);
        $donneApi = $this->json('GET', 'api/search/condition/1/1');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
