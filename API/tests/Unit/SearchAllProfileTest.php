<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Profile;
use Illuminate\Http\Request;

class SearchAllProfileTest extends TestCase
{
    public function test_Profile()
    {
        $data = Profile::All();
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/searchAll/profile');
        $dataEncode = json_encode($data);
        $this->assertEquals($donneApi,$dataEncode);
        
    }
}
