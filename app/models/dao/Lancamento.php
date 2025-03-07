<?php

namespace app\models\dao;

use app\core\Model;
use PDO;

class Lancamento extends Model
{

    public function salvar_lanc($lancamento)
    {
        try {
            $sql = "INSERT INTO lancamentos (DESCRICAO, VALOR, DATA_PAG, TIPO, OBSERVACAO, ID_USUARIO, 
                    ID_NEMBRO, ID_CARTEIRA, ID_CARTAO, ID_CONDICAO_PAGAMENTO, ID_FLUXO_FINANCEIRO) 
                    VALUES (:DESCRICAO, :VALOR, :DATA_PAG, :TIPO, :OBSERVACAO, :ID_USUARIO, 
                    :ID_NEMBRO, :ID_CARTEIRA, :ID_CARTAO, :ID_CONDICAO_PAGAMENTO, :ID_FLUXO_FINANCEIRO)";

            $qry = $this->db->prepare($sql);
            $qry->bindParam(':DESCRICAO', $lancamento->descricao);
            $qry->bindParam(':VALOR', $lancamento->valor);
            $qry->bindParam(':DATA_PAG', $lancamento->data_pag);
            $qry->bindParam(':TIPO', $lancamento->tipo);
            $qry->bindParam(':OBSERVACAO', $lancamento->observacao);
            $qry->bindParam(':ID_USUARIO', $lancamento->id_usuario);
            $qry->bindParam(':ID_NEMBRO', $lancamento->id_nembro);
            $qry->bindParam(':ID_CARTEIRA', $lancamento->id_carteira);
            $qry->bindParam(':ID_CARTAO', $lancamento->id_cartao);
            $qry->bindParam(':ID_CONDICAO_PAGAMENTO', $lancamento->id_condicoes_pagamento);
            $qry->bindParam(':ID_FLUXO_FINANCEIRO', $lancamento->id_fluxo_financeiro);

            if ($qry->execute()) {
                return $this->db->lastInsertId(); // Retorna o ID do último registro inserido
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lista_lancamento($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        lanc.id, lanc.descricao, lanc.valor, lanc.data_pag, lanc.tipo, lanc.observacao,
                        nem.nome as nembro, cond.nome as condicoes_pagamento, fluxo.nome as fluxo_financeiro	
                        FROM `lancamentos` lanc
                        join nembros nem on nem.id = lanc.id_nembro
                        join condicoes_pagamento cond on cond.id = lanc.id_condicao_pagamento
                        join fluxo_financeiro fluxo on fluxo.id = lanc.id_fluxo_financeiro
                        WHERE lanc.id_usuario = :usuario 
                        order by lanc.id desc";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $ID_USUARIO, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function id_lancamento($id_usuario, $id_lancamento)
    {
        try {
            $sql = "SELECT 
                        lanc.id, lanc.descricao, lanc.valor, lanc.data_pag, lanc.tipo, lanc.observacao, lanc.criado_em,
                        nem.nome as nembro, cond.nome as condicoes_pagamento, fluxo.nome as fluxo_financeiro	
                        FROM `lancamentos` lanc
                        join nembros nem on nem.id = lanc.id_nembro
                        join condicoes_pagamento cond on cond.id = lanc.id_condicao_pagamento
                        join fluxo_financeiro fluxo on fluxo.id = lanc.id_fluxo_financeiro
                        WHERE lanc.id_usuario = :usuario 
                        and lanc.id = :id
                        order by lanc.id desc";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
            $qry->bindValue(':id', $id_lancamento, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
