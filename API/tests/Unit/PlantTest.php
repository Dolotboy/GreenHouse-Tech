<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;


class PlantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_Plant()
    {
        $this->withoutExceptionHandling();

        $data = Plant::find(8);
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/search/plant/8');

        $this->assertEquals($dataEncode,$donneApi);

    }
}