<?php

namespace app\models\dao;

use app\core\Model;
use PDO;

class Fluxo extends Model
{

    public function lista_id($ID_USUARIO)
    {
        try {
            $sql = "SELECT * FROM fluxo_financeiro P WHERE P.ID_USUARIO = $ID_USUARIO";
            $qry = $this->db->prepare($sql);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lista_saida($ID_USUARIO)
    {
        try {
            $sql = "SELECT * FROM FLUXO_FINANCEIRO P WHERE P.TIPO = :TIPO AND P.ID_USUARIO = :USUARIO";
            $qry = $this->db->prepare($sql);

            // Use bindValue() para valores diretos
            $qry->bindValue(':TIPO', 'Saida', PDO::PARAM_STR);
            $qry->bindValue(':USUARIO', $ID_USUARIO, PDO::PARAM_INT);

            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public function lista_entrada($ID_USUARIO)
    {
        try {
            $sql = "SELECT * FROM FLUXO_FINANCEIRO P WHERE P.TIPO = :TIPO AND P.ID_USUARIO = :USUARIO";
            $qry = $this->db->prepare($sql);

            // Use bindValue() para valores diretos
            $qry->bindValue(':TIPO', 'Entrada', PDO::PARAM_STR);
            $qry->bindValue(':USUARIO', $ID_USUARIO, PDO::PARAM_INT);

            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
