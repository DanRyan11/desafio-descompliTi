<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCidade;
use App\Http\Resources\CidadeResource;
use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    protected $enderecoService;

    public function __construct(CidadeService $enderecoService)
    {
        $this->enderecoService = $enderecoService;
    }

    public function index()
    {
        $cidade = $this->enderecoService->get();
        
        return CidadeResource::collection($cidade);
    }

    public function store()
    {
        // $endereco = $this->enderecoService
        //                     ->create($request->validate());

        // return new CidadeResource($endereco);
    }

    public function show($id)
    {
        $endereco = $this->enderecoService->get($id);

        return new CidadeResource($endereco);
    }

}
