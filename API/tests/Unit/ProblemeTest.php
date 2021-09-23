<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Problem;
use Illuminate\Support\Facades\Http;

class ProblemeTest extends TestCase
{
    public function test_Probleme()
    {
        $data = Problem::find(1);
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/api/search/problem/1');
        $this->assertEquals($data,$dataEncode);     
    }
}
