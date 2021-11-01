<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use app\Models\Version;
use Illuminate\Support\Facades\Http;

class GetVersionTest extends TestCase
{
    /**
     * A basic feature test example. Comme le 20-bit de guigui
     *
     * @return void
     */
    public function test_GetVersion()
    {
        $this->withoutExceptionHandling();

        $data = Version::orderBy('idVersion', 'DESC')->get();
        $dataEncode = json_encode($data[0], JSON_NUMERIC_CHECK);
        $donneApi = Http::acceptJson()->get('http://127.0.0.1:8000/api/search/last/version');

        $this->assertEquals($dataEncode,$donneApi);
    }
}
