<?php

namespace App\Repositories;

use App\Models\Endereco;

class EnderecoRepository{

    protected $entity;

    public function __contruct(Endereco $endereco)
    {
        $this->entity = $endereco;
    }

    public function getAll()
    {
        return $this->entity->where('status',true);
    }

    public function get(string $id)
    {
        return $this->entity->where('status',true)->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(string $id,array $data)
    {
        $endereco = $this->get($id);
        return $endereco->update($data);
    }

    public function delete(string $id)
    {
        return $this->update($id,['status'=>false]);
    }

}