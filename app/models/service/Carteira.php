<?php
namespace app\models\service;
use app\models\validacao\Carteira as ValidacaoCarteira;

class Carteira{
    public static function salvar($nembro, $campo, $tabela){
        $validacao = ValidacaoCarteira::salvar($nembro);
        return Service::salvar($nembro, $campo, $validacao->listaErros(), $tabela);
    } 
}