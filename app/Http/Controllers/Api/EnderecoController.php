<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndereco;
use App\Http\Resources\EnderecoResource;
use App\Services\CidadeService;
use App\Services\EnderecoService;

class EnderecoController extends Controller
{
    protected $enderecoService;
    protected $municipioService;

    public function __construct(EnderecoService $enderecoService, CidadeService $municipioService)
    {
        $this->enderecoService  = $enderecoService;
        $this->municipioService = $municipioService;
    }

    public function index()
    {
        $enderecos = $this->enderecoService->get();

        return EnderecoResource::collection($enderecos);
    }

    public function store(StoreUpdateEndereco $request)
    {
        $params = $request->validated();

        $this->municipioService->get($params['cidade_ibge']);

        $endereco = $this->enderecoService
            ->createNewEndereco($params);

        return new EnderecoResource($endereco);
    }

    public function show($id)
    {
        $endereco = $this->enderecoService->get($id);

        return new EnderecoResource($endereco);
    }

    public function update(StoreUpdateEndereco $request, $id)
    {
        $this->enderecoService->updateEndereco($id, $request->validated());

        return response()->json(['updated' => true], 202);
    }

    public function destroy($id)
    {
        $this->enderecoService->deleteEndereco($id);

        return response()->json([], 204);
    }
}
