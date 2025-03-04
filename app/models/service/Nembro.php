<?php
namespace app\models\service;
use app\models\validacao\Nembro as ValidacaoNembro;

class Nembro{
    public static function salvar($nembro, $campo, $tabela){
        $validacao = ValidacaoNembro::salvar($nembro);
        return Service::salvar($nembro, $campo, $validacao->listaErros(), $tabela);
    } 
}