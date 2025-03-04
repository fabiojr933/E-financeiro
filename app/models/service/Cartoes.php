<?php
namespace app\models\service;
use app\models\validacao\Cartoes as ValidacaoCartoes;

class Cartoes{
    public static function salvar($cartoes, $campo, $tabela){
        $validacao = ValidacaoCartoes::salvar($cartoes);
        return Service::salvar($cartoes, $campo, $validacao->listaErros(), $tabela);
    } 
}