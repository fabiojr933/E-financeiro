<?php

namespace app\models\validacao;

use app\core\Validacao;

class Cartoes
{
    public static function salvar($cartoes)
    {
        $validacao = new Validacao($cartoes);

        $validacao->setData("nome", $cartoes->nome);
        $validacao->getData("nome")->isVazio();

        $validacao->setData("titular", $cartoes->nome);
        $validacao->getData("titular")->isVazio();

        $validacao->setData("tipo", $cartoes->tipo);
        $validacao->getData("tipo")->isVazio();

        $validacao->setData("id_usuario", $cartoes->nome);
        $validacao->getData("id_usuario")->isVazio();
        return $validacao;
    }
}
