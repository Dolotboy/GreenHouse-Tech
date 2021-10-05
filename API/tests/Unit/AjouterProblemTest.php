<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Problem;
use Illuminate\Http\Request;

class AjouterProblemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_AjouterProbleme()
    {
        $response = $this->json('POST','/api/new/problem/addProblem', [
            'problemName' => 'problemName',
            'problemType' => 'problemType',
            'problemSolution' => 'problemSolution'
        ]);

        $response->assertStatus(200);
    }
}
