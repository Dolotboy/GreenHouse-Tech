<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile;
use Illuminate\Support\Facades\Http;

class ProfileTest extends TestCase
{
    public function test_Profile()
    {
        $data = Profile::find(1);
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/search/profile/1');
        $this->assertEquals($data,$dataEncode);       
    }
}
