<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile;
use Illuminate\Support\Facades\Http;

class SearchAllProfileTest extends TestCase
{
    public function test_Profile()
    {
        $data = Profile::All();
        $dataEncode = json_encode($data);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/searchAll/profile');
        $this->assertEquals($data,$dataEncode);     
    }
}
