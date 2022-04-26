<?php

namespace App\Repositories;

use App\Models\Cidade;

class CidadeRepository{

    protected $entity;

    public function __contruct(Cidade $cidade)
    {
        $this->entity = $cidade;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function get(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

}