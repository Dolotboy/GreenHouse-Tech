<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeletePlantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = Plant::find(1);
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('/delete/plant/1');

        $this->assertEquals($dataEncode,$donneApi);
    }
}
