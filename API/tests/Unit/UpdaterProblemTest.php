<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Problem;
use Illuminate\Http\Request;

class UpdaterProblemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_UpdaterProblem()
    {
        $this->withoutExceptionHandling();

        $data = Problem::find(5);
        $dataEncode = json_encode($data);     

        $response = $this->json('PUT','/api/edit/problem/editProblem/5', [
            $dataEncode->problemName => 'problemNameEdit'
        ]);

        $response->assertStatus(200);
    }
}
