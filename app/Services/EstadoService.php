<?php

namespace App\Services;

use App\Repositories\EstadoRepository;

class EstadoService
{
    protected $repository;

    public function __construct(EstadoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get($id = false)
    {
        return $id ? $this->repository->getEstado($id) : $this->repository->getAll();
    }

    public function create(array $data)
    {
        return $this->repository->createNewEstado($data);
    }

}
