<?php

namespace app\models;

use app\core\Model;

class Usuario extends Model
{
    public function usuarioNovo($usuario)
    {
        $sql = "INSERT INTO USUARIOS SET nome = :nome, email = :email, senha_hash = :senha_hash, telefone = :telefone";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":nome", $usuario->nome);
        $qry->bindValue(":email", $usuario->email);
        $qry->bindValue(":senha_hash", $usuario->senha_hash);
        $qry->bindValue(":telefone", $usuario->telefone);
        $qry->execute();
        return $this->db->lastInsertId();
    }
}
