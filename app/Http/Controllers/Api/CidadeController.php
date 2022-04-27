<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiServicosIBGE;
use App\Http\Controllers\Controller;
use App\Http\Resources\CidadeResource;
use App\Services\CidadeService;

class CidadeController extends Controller
{
    protected $municipioService;

    public function __construct(CidadeService $municipioService)
    {
        $this->municipioService = $municipioService;
    }

    public function index()
    {
        $cidade = $this->municipioService->get();
        
        return CidadeResource::collection($cidade);
    }

    public function show($id)
    {
        $endereco = $this->municipioService->get($id);

        return new CidadeResource($endereco);
    }

    public function import($uf)
    {
        $municipiosIBGE = array_map(
            fn ($cidade) => $cidade['id_ibge'],
            $this->municipioService->get()->toArray()
        );

        $data = ApiServicosIBGE::getMunicipios($uf);

        $created = [
            'created' => 0,
            'data'    => [],
        ];

        foreach ($data as $cidade) {
            if (!in_array($cidade['id'], $municipiosIBGE)) {
                $created['created']++;
                $created['data'][] = $this->municipioService->create($this->parseCidade($cidade));
            }
        }

        return response()->json($created, 201);
    }

    public function parseCidade(array $cidade): array
    {
        $nome    = $cidade['nome'];
        $id_ibge = $cidade['id'];

        return [
            'id_ibge' => $id_ibge,
            'nome'    => $nome,
        ];
    }

}
