<?php

namespace Tests\Feature\Api;

use App\Models\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CidadeTest extends TestCase
{
    public function test_get_all()
    {
        $response = $this->getJson('/cidades');

        $response->assertStatus(200);
    }

    public function test_get_all_com_total()
    {
        Cidade::factory()->count(10)->create();    

        $response = $this->getJson('/cidades');

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    public function test_get_single()
    {
        $cidade = Cidade::factory()->create();

        $response = $this->getJson("/cidades/{$cidade->id_ibge}");
        
        $response->assertStatus(200);
    }

    public function test_get_cidade_not_found()
    {
        $response = $this->getJson('/cidades/valor_fake');
        
        $response->assertStatus(404);
    }

    public function test_import()
    {
        $response = $this->postJson('/cidades/import/mg');
        
        $response->assertStatus(201);
    }

}
