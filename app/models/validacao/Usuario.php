<?php

namespace app\models\validacao;

use app\core\Validacao;

class Usuario
{
    public static function salvar($usuario)
    {
        $validacao = new Validacao($usuario);
        $validacao->setData("nome", $usuario->nome);
        $validacao->getData("nome")->isVazio();

        $validacao->setData("email", $usuario->email);
        $validacao->getData("email")->isVazio();

        $validacao->setData("telefone", $usuario->telefone);
        $validacao->getData("telefone")->isVazio();

        $validacao->setData("senha_hash", $usuario->telefone);
        $validacao->getData("senha_hash")->isVazio();

        return $validacao;
    }
}