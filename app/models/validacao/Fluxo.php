<?php

namespace app\models\validacao;

use app\core\Validacao;

class Fluxo
{
    public static function salvar($fluxo)
    {
        $validacao = new Validacao($fluxo);
        $validacao->setData("nome", $fluxo->nome);
        $validacao->getData("nome")->isVazio();

        $validacao->setData("tipo", $fluxo->nome);
        $validacao->getData("tipo")->isVazio();

        $validacao->setData("id_usuario", $fluxo->nome);
        $validacao->getData("id_usuario")->isVazio();

        return $validacao;
    }
}
