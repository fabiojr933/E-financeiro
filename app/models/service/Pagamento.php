<?php
namespace app\models\service;
use app\models\validacao\Pagamento as ValidacaoPagamento;

class Pagamento{
    public static function salvar($pagamento, $campo, $tabela){
        $validacao = ValidacaoPagamento::salvar($pagamento);
        return Service::salvar($pagamento, $campo, $validacao->listaErros(), $tabela);
    } 
}