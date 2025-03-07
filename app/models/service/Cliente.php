<?php
namespace app\models\service;
use app\models\validacao\Cliente as ValidacaoCliente;

class Cliente{
    public static function salvar($cliente, $campo, $tabela){
        $validacao = ValidacaoCliente::salvar($cliente);
        return Service::salvar($cliente, $campo, $validacao->listaErros(), $tabela);
    } 
}