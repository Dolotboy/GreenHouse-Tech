<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Problem;

class ProblemeTest extends TestCase
{
    public function test_Probleme()
    {
        $data = Problem::find(1);
        $donneApi = $this->json('GET', 'api/search/problem/1');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
