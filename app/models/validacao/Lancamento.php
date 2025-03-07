<?php

namespace app\models\validacao;

use app\core\Validacao;

class Lancamento
{
    public static function salvar($lancamento)
    {
        $validacao = new Validacao($lancamento);

        $validacao->setData("valor", $lancamento->valor);
        $validacao->getData("valor")->isVazio();

        $validacao->setData("descricao", $lancamento->descricao);
        $validacao->getData("descricao")->isVazio();

        $validacao->setData("tipo", $lancamento->tipo);
        $validacao->getData("tipo")->isVazio();

        $validacao->setData("id_usuario", $lancamento->nome);
        $validacao->getData("id_usuario")->isVazio();

        return $validacao;
    }
}
