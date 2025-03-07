<?php
namespace app\models\service;
use app\models\validacao\Lancamento as ValidacaoLancamento;

class Lancamento{
    public static function salvar($lancamento, $campo, $tabela){
        $validacao = ValidacaoLancamento::salvar($lancamento);
        return Service::salvar($lancamento, $campo, $validacao->listaErros(), $tabela);
    } 
}