<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionNb;
use Illuminate\Support\Facades\Http;

class ConditionNBTest extends TestCase
{
    
    public function test_conditionNB()
    {
        $data = FavorableConditionNb::find(1);
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/search/condition/2/1');
        $this->assertEquals($donneApi,$dataEncode);      
    }
}
