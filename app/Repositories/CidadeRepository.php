<?php

namespace App\Repositories;

use App\Models\Cidade;

class CidadeRepository{

    protected $entity;

    public function __construct(Cidade $cidade)
    {
        $this->entity = $cidade;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function get(string $id, bool $return404=true)
    {
        $cidade = $this->entity
                    ->where('id_ibge',$id);
        return $return404 ? $cidade->firstOrFail() : $cidade->first();
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

}