<?php

namespace app\models\validacao;

use app\core\Validacao;

class Carteira
{
    public static function salvar($carteira)
    {
        $validacao = new Validacao($carteira);
        $validacao->setData("nome", $carteira->nome);
        $validacao->getData("nome")->isVazio();
        $validacao->setData("id_usuario", $carteira->nome);
        $validacao->getData("id_usuario")->isVazio();
        return $validacao;
    }
}
