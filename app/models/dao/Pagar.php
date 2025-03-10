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

    public function lista_contas_pagar_delete($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as fornecedor
                        FROM contas_pagar PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN fornecedores F ON F.id = PG.id_fornecedor
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

    public function lista_contas_pagar($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as fornecedor
                        FROM contas_pagar PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN fornecedores F ON F.id = PG.id_fornecedor
                        WHERE PG.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $ID_USUARIO, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lista_contas_pagar_pendente($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as fornecedor
                        FROM contas_pagar PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN fornecedores F ON F.id = PG.id_fornecedor
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

    public function lista_contas_pagar_pagas($ID_USUARIO)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome AS  NEMBRO, pg.pago,
                        FU.nome AS fluxo_financeiro, F.nome as fornecedor
                        FROM contas_pagar PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN fornecedores F ON F.id = PG.id_fornecedor
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

    public function id_pagar($id_usuario, $id_pagar)
    {
        try {
            $sql = "SELECT 
                        PG.id, PG.descricao, PG.valor, PG.vencimento, PG.observacao, NE.nome as  nembro, pg.pago, pg.criado_em, pg.observacao,
                        FU.nome AS fluxo_financeiro, F.nome AS  fornecedores
                        FROM contas_pagar PG
                        JOIN nembros NE ON NE.id = PG.id_nembro 
                        JOIN fluxo_financeiro FU ON FU.id = PG.id_fluxo_financeiro
                        JOIN fornecedores F ON F.id = PG.id_fornecedor
                        WHERE PG.id_usuario = :usuario
                        and pg.id = :id";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
            $qry->bindValue(':id', $id_pagar, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function pagamento($pagar)
    {
        try {
            $sql = "UPDATE CONTAS_PAGAR SET 
                        valor_pago = :valor_pago,
                        id_condicao_pagamento = :id_condicao_pagamento,
                        id_carteira = :id_carteira,
                        id_cartao = :id_cartao,
                        pago = :pago,
                        pago_em = :pago_em
                    WHERE id = :id
                    AND id_usuario = :id_usuario";

            $qry = $this->db->prepare($sql);
            $qry->bindValue(':valor_pago', $pagar->valor_pago, PDO::PARAM_STR);
            $qry->bindValue(':id_condicao_pagamento', $pagar->id_condicao_pagamento, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':id_carteira', $pagar->id_carteira, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':id_cartao', $pagar->id_cartao, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':pago', $pagar->pago, PDO::PARAM_INT); // 1 ou 0, então INT
            $qry->bindValue(':pago_em', $pagar->pago_em, PDO::PARAM_STR); // 1 ou 0, então INT
            $qry->bindValue(':id_usuario', $pagar->id_usuario, PDO::PARAM_INT); // Se for número
            $qry->bindValue(':id', $pagar->id, PDO::PARAM_INT); // Se for número
            $qry->execute();
        } catch (\Throwable $e) {
            throw new \Exception("Erro ao atualizar pagamento: " . $e->getMessage());
        }
    }
}
