<?php

namespace app\models\validacao;

use app\core\Validacao;

class Fornecedor
{
    public static function salvar($fornecedor)
    {
        $validacao = new Validacao($fornecedor);
        $validacao->setData("nome", $fornecedor->nome);
        $validacao->getData("nome")->isVazio();

        $validacao->setData("id_usuario", $fornecedor->nome);
        $validacao->getData("id_usuario")->isVazio();

        return $validacao;
    }
}
