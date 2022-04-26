<?php

namespace App\Services;

use App\Repositories\EnderecoRepository;

class EnderecoService{
    protected $repository;

    public function __construct(EnderecoRepository $repository)
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

    public function update($id, array $data)
    {
        return $this->repository->update($id,$data);
    }

    function delete($id)
    {
        return $this->repository->delete($id);
    }
}