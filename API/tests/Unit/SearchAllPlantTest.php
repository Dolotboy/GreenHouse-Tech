<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;

class SearchAllPlantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_SearchAllPlant()
    {
        $data = Plant::All();
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/searchAll/plant');
        $dataEncode = json_encode($data);
        $this->assertEquals($donneApi,$dataEncode);
    }
}
