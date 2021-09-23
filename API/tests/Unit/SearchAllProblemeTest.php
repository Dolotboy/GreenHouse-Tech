<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Problem;
use Illuminate\Support\Facades\Http;

class SearchAllProblemeTest extends TestCase
{
    public function test_SearchAllProbleme()
    {
        $data = Problem::All();
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/searchALL/problem');
        $this->assertEquals($data,$dataEncode);       
    }
}
