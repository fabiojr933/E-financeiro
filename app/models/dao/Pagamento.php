<?php

namespace app\models\dao;

use app\core\Model;

class Pagamento extends Model
{

    public function lista_id($ID_USUARIO)
    {
        try {
            $sql = "SELECT * FROM condicoes_pagamento P WHERE P.ID_USUARIO = $ID_USUARIO";
            $qry = $this->db->prepare($sql);
            $qry->execute();
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
