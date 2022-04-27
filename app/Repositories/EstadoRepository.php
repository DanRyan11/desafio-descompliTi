<?php

namespace App\Repositories;

use App\Models\Estado;

class EstadoRepository
{
    protected $entity;

    public function __construct(Estado $estado)
    {
        $this->entity = $estado;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function getEstado(string $id)
    {
        return $this->entity
                    ->where('id_ibge', $id)
                    ->orWhere('sigla', $id)
                        ->firstOrFail();
    }

    public function createNewEstado(array $data)
    {
        return $this->entity->create($data);
    }

}
