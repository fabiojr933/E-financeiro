<?php

namespace app\models\validacao;

use app\core\Validacao;

class Nembro
{
    public static function salvar($nembro)
    {
        $validacao = new Validacao($nembro);
        $validacao->setData("nome", $nembro->nome);
        $validacao->getData("nome")->isVazio();

        $validacao->setData("id_usuario", $nembro->nome);
        $validacao->getData("id_usuario")->isVazio();

        return $validacao;
    }
}
