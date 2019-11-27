<?php

class ComentarioModel
{

    private $db;

    public function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
    }

    public function getComentario($idComentario)
    {
        $query = $this->db->prepare('SELECT * FROM comentario where id_comentario=?');
        $query->execute(array($idComentario));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getComentariosPorinmueble($inmueble)
    {

        $query = $this->db->prepare('SELECT texto, puntaje, id_usuario_fk, id_comentario, email from comentario join inmueble on id_inmueble_fk = id_inmueble join usuario on id_usuario_fk=id WHERE id_inmueble_fk = ? ORDER BY puntaje DESC');
        $query->execute(array($inmueble));

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getComentariosPorUsuario($idUsuario)
    {

        $query = $this->db->prepare('SELECT count(id_comentario) as cantidad from comentario where id_usuario_fk=?');
        $query->execute(array($idUsuario));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getPromedio($idInmueble)
    {
        $query = $this->db->prepare('SELECT AVG(puntaje) as promedio FROM comentario where id_inmueble_fk=?');
        $query->execute(array($idInmueble));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function save($texto, $puntaje, $id_inmueble, $id_usuario)
    {

        $query = $this->db->prepare('INSERT INTO comentario(texto, puntaje, id_inmueble_fk, id_usuario_fk) VALUES (?, ?, ?, ?)');
        $query->execute(array($texto, $puntaje, $id_inmueble, $id_usuario));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function delete($idComentario)
    {

        $query = $this->db->prepare('DELETE FROM comentario where id_comentario=?');
        $query->execute(array($idComentario));
    }
}
