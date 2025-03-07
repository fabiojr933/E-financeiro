<?php
namespace app\models\service;
use app\models\validacao\Fornecedor as ValidacaoFornecedor;

class Fornecedor{
    public static function salvar($fornecedor, $campo, $tabela){
        $validacao = ValidacaoFornecedor::salvar($fornecedor);
        return Service::salvar($fornecedor, $campo, $validacao->listaErros(), $tabela);
    } 
}