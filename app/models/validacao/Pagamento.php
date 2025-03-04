<?php

namespace app\models\validacao;

use app\core\Validacao;

class Pagamento
{
    public static function salvar($pagamento)
    {
        $validacao = new Validacao($pagamento);
        $validacao->setData("nome", $pagamento->nome);
        $validacao->getData("nome")->isVazio();
        
        $validacao->setData("id_usuario", $pagamento->nome);
        $validacao->getData("id_usuario")->isVazio();
        
        return $validacao;
    }
}
