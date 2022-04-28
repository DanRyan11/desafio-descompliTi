<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ApiServicosIBGE
{
    static $url = 'https://servicodados.ibge.gov.br/api/v1/localidades';

    static function parseUF($uf){
        return $uf ? "/$uf" : '';
    }

    static function getEstados()
    {
        $data = Http::get(Self::$url."/estados")->json();

        return $data;
    }

    static function getMunicipios($uf = false)
    {
        $uf = Self::parseUF($uf);

        if(!$uf) throw new \Exception("Munícipio não selecionado", 1);

        $data = Http::get(Self::$url."/estados{$uf}/municipios")->json();

        return $data;
    }

    static function getMunicipio($ibge = false)
    {
        if(!$ibge) throw new \Exception("Munícipio não selecionado", 1);

        $data = Http::get(Self::$url."/municipios")->json();

        return $data;
    }
}
