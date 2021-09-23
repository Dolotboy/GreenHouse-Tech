<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile;

class ProfileTest extends TestCase
{
    public function test_Profile()
    {
        $data = Profile::find(1);
        $donneApi = $this->json('GET', 'search/profile/1');
        $dataEncode = json_encode($data);
        $this->assertEquals($data,$dataEncode);
        
    }
}
