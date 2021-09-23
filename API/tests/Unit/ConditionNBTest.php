<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionNb;

class ConditionNBTest extends TestCase
{
    
    public function test_conditionNB()
    {
        $data = FavorableConditionNb::find(1);
        $donneApi = $this->json('GET', 'api/search/condition/2/1');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
