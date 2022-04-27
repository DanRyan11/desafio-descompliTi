<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiServicosIBGE;
use App\Http\Controllers\Controller;
use App\Http\Resources\EstadoResource;
use App\Services\EstadoService;

class EstadoController extends Controller
{
    protected $estadoService;

    public function __construct(EstadoService $estadoService)
    {
        $this->estadoService = $estadoService;
    }

    public function index()
    {
        $estados = $this->estadoService->get();

        return EstadoResource::collection($estados);
    }

    public function show($id)
    {
        $estado = $this->estadoService->get($id);

        return new EstadoResource($estado);
    }

    public function import()
    {
        $estadosIBGE = array_map(
            fn ($estado) => $estado['id_ibge'],
            $this->estadoService->get()->toArray()
        );

        $data = ApiServicosIBGE::getEstados();
        $created = [
            'created' => 0,
            'data'    => [],
        ];

        foreach ($data as $estado) {
            if (!in_array($estado['id'], $estadosIBGE)) {
                $created['created']++;
                $created['data'][] = $this->estadoService->create($this->parseEstado($estado));
            }
        }

        return response()->json($created, 201);
    }

    public function parseEstado(array $estado): array
    {
        $uf      = $estado['sigla'];
        $nome    = $estado['nome'];
        $id_ibge = $estado['id'];

        return [
            'id_ibge' => $id_ibge,
            'sigla'   => $uf,
            'nome'    => $nome,
        ];
    }
}
