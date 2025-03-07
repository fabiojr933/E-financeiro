<?php

namespace app\models\dao;

use app\core\Model;
use PDO;

class Pagar extends Model
{

    public function salvar_pagar($pagar)
    {
        try {
            $sql = "INSERT INTO contas_pagar (DESCRICAO, VALOR, vencimento, OBSERVACAO, ID_USUARIO, ID_NEMBRO, ID_FORNECEDOR, ID_FLUXO_FINANCEIRO) 
                    VALUES (:DESCRICAO, :VALOR, :vencimento, :OBSERVACAO, :ID_USUARIO, :ID_NEMBRO, :ID_FORNECEDOR, :ID_FLUXO_FINANCEIRO)";

            $qry = $this->db->prepare($sql);
            $qry->bindParam(':DESCRICAO', $pagar->descricao);
            $qry->bindParam(':VALOR', $pagar->valor);
            $qry->bindParam(':vencimento', $pagar->vencimento);
            $qry->bindParam(':OBSERVACAO', $pagar->observacao);
            $qry->bindParam(':ID_USUARIO', $pagar->id_usuario);
            $qry->bindParam(':ID_NEMBRO', $pagar->id_nembro);
            $qry->bindParam(':ID_FORNECEDOR', $pagar->id_fornecedor);
            $qry->bindParam(':ID_FLUXO_FINANCEIRO', $pagar->id_fluxo_financeiro);

            if ($qry->execute()) {
                return $this->db->lastInsertId(); // Retorna o ID do último registro inserido
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    } 
   
}
