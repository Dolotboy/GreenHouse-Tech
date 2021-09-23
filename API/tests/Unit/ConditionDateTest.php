<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionDate;
use Illuminate\Support\Facades\Http;

class ConditionDateTest extends TestCase
{
    
    public function test_conditionDate()
    {
        $data = FavorableConditionDate::find(1);
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/search/condition/1/1');
        $this->assertEquals($donneApi,$dataEncode);       
    }
}
