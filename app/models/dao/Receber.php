<?php

namespace app\models\dao;

use app\core\Model;
use PDO;

class Receber extends Model
{

    public function salvar_receber($receber)
    {
        try {
            $sql = "INSERT INTO contas_receber (DESCRICAO, VALOR, vencimento, OBSERVACAO, ID_USUARIO, ID_NEMBRO, id_cliente, ID_FLUXO_FINANCEIRO) 
                    VALUES (:DESCRICAO, :VALOR, :vencimento, :OBSERVACAO, :ID_USUARIO, :ID_NEMBRO, :id_cliente, :ID_FLUXO_FINANCEIRO)";

            $qry = $this->db->prepare($sql);
            $qry->bindParam(':DESCRICAO', $receber->descricao);
            $qry->bindParam(':VALOR', $receber->valor);
            $qry->bindParam(':vencimento', $receber->vencimento);
            $qry->bindParam(':OBSERVACAO', $receber->observacao);
            $qry->bindParam(':ID_USUARIO', $receber->id_usuario);
            $qry->bindParam(':ID_NEMBRO', $receber->id_nembro);
            $qry->bindParam(':id_cliente', $receber->id_cliente);
            $qry->bindParam(':ID_FLUXO_FINANCEIRO', $receber->id_fluxo_financeiro);

            if ($qry->execute()) {
                return $this->db->lastInsertId(); // Retorna o ID do último registro inserido
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lista_contas_receber_delete($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as cliente
                        FROM contas_receber PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN clientes F ON F.id = PG.id_cliente
                        WHERE PG.id_usuario = :usuario
                        and pg.pago = 0";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $ID_USUARIO, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lista_contas_receber($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as cliente
                        FROM contas_receber PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN clientes F ON F.id = PG.id_cliente
                        WHERE PG.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $ID_USUARIO, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lista_contas_receber_pendente($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as cliente
                        FROM contas_receber PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN clientes F ON F.id = PG.id_cliente
                        WHERE PG.id_usuario = :usuario
                        and pg.pago = 0";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $ID_USUARIO, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lista_contas_receber_pagas($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as cliente
                        FROM contas_receber PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN clientes F ON F.id = PG.id_cliente
                        WHERE PG.id_usuario = :usuario
                        and pg.pago = 1";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $ID_USUARIO, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function id_receber($id_usuario, $id_receber)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome as  nembro, pg.pago, pg.criado_em, pg.observacao,
                        FU.nome AS fluxo_financeiro, F.nome AS  cliente
                        FROM contas_receber PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN clientes F ON F.id = PG.id_cliente
                        WHERE PG.id_usuario = :usuario
                        and pg.id = :id";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
            $qry->bindValue(':id', $id_receber, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function recebimento($receber)
    {
        try {
            $sql = "UPDATE contas_receber SET 
                        valor_pago = :valor_pago,
                        id_condicao_pagamento = :id_condicao_pagamento,
                        id_carteira = :id_carteira,
                        id_cartao = :id_cartao,
                        pago_em = :pago_em,
                        pago = :pago
                       
                    WHERE id = :id
                    AND id_usuario = :id_usuario";

            $qry = $this->db->prepare($sql);
            $qry->bindValue(':valor_pago', $receber->valor_pago, PDO::PARAM_STR);
            $qry->bindValue(':id_condicao_pagamento', $receber->id_condicao_pagamento, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':id_carteira', $receber->id_carteira, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':id_cartao', $receber->id_cartao, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':pago_em', $receber->pago_em, PDO::PARAM_STR); // Se for número
            $qry->bindValue(':pago', $receber->pago, PDO::PARAM_INT); // 1 ou 0, então INT
            $qry->bindValue(':id_usuario', $receber->id_usuario, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':id', $receber->id, PDO::PARAM_INT); // Se for número          
            $qry->execute();
        } catch (\Throwable $e) {
            throw new \Exception("Erro ao atualizar pagamento: " . $e->getMessage());
        }
    }
}
