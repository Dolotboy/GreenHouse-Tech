<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FavorableConditionNb;
use Illuminate\Support\Facades\Http;

class SearchAllFavConditionNBTest extends TestCase
{
    public function test_SearchAllFavConditionNB()
    {
        $data = FavorableConditionNB::All();
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/searchAll/condition/2');
        $this->assertEquals($data,$dataEncode);     
    }
}
