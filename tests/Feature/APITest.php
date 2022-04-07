<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_bars()
    {
        $response = $this->get('/api/bars');

        $response->assertStatus(200);
    }

    public function test_barsUnique()
    {
        $response = $this->get('/api/bars/1');

        $response->assertStatus(200);
    }

    public function test_taille()
    {
        $response = $this->get('api/tailles');

        $response->assertStatus(200);
    }

    public function test_juridique()
    {
        $response = $this->get('api/juridiques');

        $response->assertStatus(200);
    }

    public function test_noga()
    {
        $response = $this->get('api/nogas');

        $response->assertStatus(200);
    }
    
    public function test_search(){
        $response = $this->get('http://172.105.245.5/api/search?taille=&noga=9496&natureJuridique=&longitude=6.136097248177379&latitude=46.19683777664278&radius=3039.28537165674');

        $response->assertStatus(200);
        
    }
}
