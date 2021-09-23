<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Problem;

class SearchAllProblemeTest extends TestCase
{
    public function test_SearchAllProbleme()
    {
        $data = Problem::All();
        $donneApi = $this->json('GET', 'api/searchALL/problem');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
