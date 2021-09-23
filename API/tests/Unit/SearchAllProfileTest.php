<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile;

class SearchAllProfileTest extends TestCase
{
    public function test_Profile()
    {
        $data = Profile::All();
        $donneApi = $this->json('GET', 'api/searchAll/profile');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
