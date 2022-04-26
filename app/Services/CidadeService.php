<?php

namespace App\Services;

use App\Repositories\CidadeRepository;

class CidadeService{
    protected $repository;

    public function __construct(CidadeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get($id = false)
    {
        return $id ? $this->repository->get($id) : $this->repository->getAll();
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}