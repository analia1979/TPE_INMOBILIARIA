<?php

class UsuarioModel
{

    private $db;

    public function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
    }

    public function getUsuario($email)
    {

        $query = $this->db->prepare('SELECT * from usuario where email=?');
        $query->execute(array($email));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getUsuarioID($usuario)
    {

        $query = $this->db->prepare('SELECT * from usuario where id=?');
        $query->execute(array($usuario));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function addUsuario($email, $clave)
    {
        $query = $this->db->prepare('INSERT INTO usuario(email,password,admin) values(?,?,?)');
        $query->execute(array($email, $clave, 0));
        return $this->db->lastInsertId();
    }
    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function updateUsuario($idUsuario, $tipoUsuario)
    {

        $query = $this->db->prepare('UPDATE usuario SET admin = ? WHERE id = ?');
        $query->execute(array($tipoUsuario, $idUsuario));
    }
    public function deleteUsuario($idUsuario)
    {

        $query = $this->db->prepare('DELETE FROM usuario where id=?');
        $query->execute(array($idUsuario));
    }
}
