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
        return $id ? $this->repository->getEndereco($id) : $this->repository->getAll();
    }

    public function createNewEndereco(array $data)
    {
        return $this->repository->createNewEndereco($data);
    }

    public function updateEndereco($id, array $data)
    {
        return $this->repository->updateEndereco($id,$data);
    }

    function deleteEndereco($id)
    {
        return $this->repository->delete($id);
    }
}