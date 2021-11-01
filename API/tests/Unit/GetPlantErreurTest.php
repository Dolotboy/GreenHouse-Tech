<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;
use Exception;

class GetPlantErreurTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_GetPlantErreur()
    {
        try
        {
            $response = $this->get('http://127.0.0.1:8000/api/search/plant/99');

            $response->assertStatus(404);
        
        }
        catch(Exception $e)
        {
            
            return $e;
        }
        

    }
}
