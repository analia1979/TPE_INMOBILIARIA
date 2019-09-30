<?php

class UsuarioModel{

    private $db;

public function __construct(){

    $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
}

public function getUsuario($usuario){

    $query= $this->db->prepare('SELECT * from usuario where email=?');
    $query->execute(array($usuario));
    return $query->fetch(PDO::FETCH_OBJ);

}



}