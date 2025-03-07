<?php
namespace app\models\service;
use app\models\validacao\Fluxo as ValidacaoFluxo;

class Fluxo{
    public static function salvar($fluxo, $campo, $tabela){
        $validacao = ValidacaoFluxo::salvar($fluxo);
        return Service::salvar($fluxo, $campo, $validacao->listaErros(), $tabela);
    } 
}