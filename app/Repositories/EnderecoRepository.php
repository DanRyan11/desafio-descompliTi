<?php

namespace App\Repositories;

use App\Models\Endereco;

class EnderecoRepository{

    protected $entity;

    public function __construct(Endereco $endereco)
    {
        $this->entity = $endereco;
    }

    public function getAll()
    {
        return $this->entity
                    ->where('status',true)
                        ->get();
    }

    public function getEndereco(string $id)
    {
        return $this->entity
                    ->where('status',true)
                    ->where('id', $id)
                        ->firstOrFail();
    }

    public function createNewEndereco(array $data)
    {
        return $this->entity->create($data);
    }

    public function updateEndereco(string $id,array $data)
    {
        $endereco = $this->getEndereco($id);
        return $endereco->update($data);
    }

    public function delete(string $id)
    {
        return $this->updateEndereco($id,['status'=>false]);
    }

}