<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndereco;
use App\Http\Resources\EnderecoResource;
use App\Services\EnderecoService;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    protected $enderecoService;

    public function __construct(EnderecoService $enderecoService)
    {
        $this->enderecoService = $enderecoService;
    }

    public function index()
    {
        $enderecos = $this->enderecoService->get();

        return EnderecoResource::collection($enderecos);
    }

    public function store(StoreUpdateEndereco $request)
    {
        $endereco = $this->enderecoService
            ->createNewEndereco($request->validated());

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
