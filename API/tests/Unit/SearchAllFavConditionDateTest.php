<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionDate;
use Illuminate\Support\Facades\Http;

class SearchAllFavConditionDateTest extends TestCase
{
    public function test_SearchAllFavConditionDate()
    {
        $data = FavorableConditionDate::All();
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/searchAll/condition/1');
        $this->assertEquals($data,$dataEncode);  
    }
}
