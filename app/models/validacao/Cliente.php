<?php

namespace app\models\validacao;

use app\core\Validacao;

class Cliente
{
    public static function salvar($cliente)
    {
        $validacao = new Validacao($cliente);
        $validacao->setData("nome", $cliente->nome);
        $validacao->getData("nome")->isVazio();

        $validacao->setData("id_usuario", $cliente->nome);
        $validacao->getData("id_usuario")->isVazio();

        return $validacao;
    }
}
