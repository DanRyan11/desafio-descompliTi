<?php

namespace Tests\Feature\Api;

use App\Models\Estado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EstadoTest extends TestCase
{
    public function test_get_all()
    {
        $response = $this->getJson('/estados');

        $response->assertStatus(200);
    }

    public function test_get_all_com_total()
    {
        Estado::factory()->count(10)->create();    

        $response = $this->getJson('/estados');

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    public function test_get_single()
    {
        $estado = Estado::factory()->create();

        $response = $this->getJson("/estados/{$estado->id_ibge}");
        
        $response->assertStatus(200);
    }

    public function test_get_estado_not_found()
    {
        $response = $this->getJson('/estados/valor_fake');
        
        $response->assertStatus(404);
    }

    public function test_import()
    {
        $response = $this->postJson('/estados/import');
        
        $response->assertStatus(201);
    }

}
