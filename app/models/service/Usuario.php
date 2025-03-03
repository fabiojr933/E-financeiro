<?php
namespace app\models\service;
use app\models\validacao\usuario as ValidacaoUsuario;

class Usuario{
    public static function salvar($usuario, $campo, $tabela){
        $validacao = ValidacaoUsuario::salvar($usuario);
        return Service::salvar($usuario, $campo, $validacao->listaErros(), $tabela);
    } 
}