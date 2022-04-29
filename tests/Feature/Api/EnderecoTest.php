<?php

namespace Tests\Feature\Api;

use App\Models\Cidade;
use App\Models\Endereco;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnderecoTest extends TestCase
{
    public function test_get_all()
    {
        $response = $this->getJson('/enderecos');

        $response->assertStatus(200);
    }

    public function test_get_all_com_total()
    {
        Endereco::factory()->count(10)->create();    

        $response = $this->getJson('/enderecos');

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    public function test_get_single()
    {
        $endereco = Endereco::factory()->create();

        $response = $this->getJson("/enderecos/{$endereco->id}");
        
        $response->assertStatus(200);
    }

    public function test_get_endereco_not_found()
    {
        $response = $this->getJson('/enderecos/valor_fake');
        
        $response->assertStatus(404);
    }

    public function test_validacoes_create()
    {
        $data = [
            'logradouro'  => 'Rua Teste',
            'numero'      => '123',
            'bairro'      => 'Bairro Teste',
            'cidade_ibge' => Cidade::factory()->create()->id_ibge,
        ];

        shuffle($data);
        array_shift($data);

        $response = $this->postJson('/enderecos',$data);
        
        $response->assertStatus(422);
    }

    public function test_create()
    {
        $data = [
            "logradouro"  => "Rua dos bobos",
            "numero"      => "123",
            "bairro"      => "123",
            "complemento" => "",
            "cidade_ibge" => Cidade::factory()->create()->id_ibge,
        ];

        $response = $this->postJson('/enderecos',$data);
        
        $response->assertStatus(201);
    }

    public function test_update()
    {
        $endereco = Endereco::factory()->create();

        $data = [
            'logradouro'  => 'Rua Teste',
            'numero'      => '123',
            'bairro'      => 'Bairro Teste',
            'complemento' => 'Complemento Teste',
            'cidade_ibge' => Cidade::factory()->create()->id_ibge,
        ];
        
        $response = $this->putJson("/enderecos/{$endereco->id}",$data);
        
        $response->assertStatus(202);
    }

    public function test_id_invalido_update()
    {
        $data = [
            'logradouro'  => 'Rua Teste',
            'numero'      => '123',
            'bairro'      => 'Bairro Teste',
            'complemento' => 'Complemento Teste',
            'cidade_ibge' => Cidade::factory()->create()->id_ibge,
        ];

        $response = $this->putJson("/enderecos/valor_fake",$data);

        $response->assertStatus(404);
    }

    public function test_validacoes_update()
    {
        $data = [
            'logradouro'  => 'Rua Teste',
            'numero'      => '123',
            'bairro'      => 'Bairro Teste',
            'cidade_ibge' => Cidade::factory()->create()->id_ibge,
        ];

        shuffle($data);
        array_shift($data);

        $response = $this->putJson("/enderecos/valor_fake",$data);

        $response->assertStatus(422);
    }

    public function test_delete()
    {
        $endereco = Endereco::factory()->create();

        $response = $this->deleteJson("/enderecos/{$endereco->id}");
        
        $response->assertStatus(204);
    }
}
