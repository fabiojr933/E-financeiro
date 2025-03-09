<?php

namespace app\models\dao;

use app\core\Model;
use PDO;

class Home extends Model
{

    public function EntradaData($data_inicio, $data_fim, $usuario)
    {
        try {
            $sql = "SELECT 
            sum(lancamentos.valor) as total            
            FROM `lancamentos` WHERE lancamentos.data_pag BETWEEN :DATA01 and :DATA02
           and lancamentos.tipo = 'Entrada' and lancamentos.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':DATA01', $data_inicio, PDO::PARAM_STR);
            $qry->bindValue(':DATA02', $data_fim, PDO::PARAM_STR);
            $qry->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function SaidaData($data_inicio, $data_fim, $usuario)
    {
        try {
            $sql = "SELECT 
            sum(lancamentos.valor) as total            
            FROM `lancamentos` WHERE lancamentos.data_pag BETWEEN :DATA01 and :DATA02
           and lancamentos.tipo = 'Saida' and lancamentos.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':DATA01', $data_inicio, PDO::PARAM_STR);
            $qry->bindValue(':DATA02', $data_fim, PDO::PARAM_STR);
            $qry->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function contas_a_receber_data($data_inicio, $data_fim, $usuario)
    {
        try {
            $sql = "SELECT 
                    sum(contas_receber.valor) as total            
                    FROM contas_receber WHERE contas_receber.vencimento BETWEEN :DATA01 and :DATA02
                    and contas_receber.pago = 0 and contas_receber.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':DATA01', $data_inicio, PDO::PARAM_STR);
            $qry->bindValue(':DATA02', $data_fim, PDO::PARAM_STR);
            $qry->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function contas_a_recebidas_data($data_inicio, $data_fim, $usuario)
    {
        try {
            $sql = "SELECT 
                    sum(contas_receber.valor) as total            
                    FROM contas_receber WHERE contas_receber.vencimento BETWEEN :DATA01 and :DATA02
                    and contas_receber.pago = 1 and contas_receber.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':DATA01', $data_inicio, PDO::PARAM_STR);
            $qry->bindValue(':DATA02', $data_fim, PDO::PARAM_STR);
            $qry->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function contas_a_pagar_data($data_inicio, $data_fim, $usuario)
    {
        try {
            $sql = "SELECT 
                    sum(contas_pagar.valor) as total            
                    FROM contas_pagar WHERE contas_pagar.vencimento BETWEEN :DATA01 and :DATA02
                    and contas_pagar.pago = 0 and contas_pagar.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':DATA01', $data_inicio, PDO::PARAM_STR);
            $qry->bindValue(':DATA02', $data_fim, PDO::PARAM_STR);
            $qry->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function contas_pagas_data($data_inicio, $data_fim, $usuario)
    {
        try {
            $sql = "SELECT 
                    sum(contas_pagar.valor) as total            
                    FROM contas_pagar WHERE contas_pagar.vencimento BETWEEN :DATA01 and :DATA02
                    and contas_pagar.pago = 1 and contas_pagar.id_usuario = :usuario";
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':DATA01', $data_inicio, PDO::PARAM_STR);
            $qry->bindValue(':DATA02', $data_fim, PDO::PARAM_STR);
            $qry->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $qry->execute();
            return $qry->fetch(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
