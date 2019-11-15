<?php

class CategoriasModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
    }

    /**
     * Obtiene la lista de categorias
     */
    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM categoria ORDER BY id_categoria ASC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retorna una categoria según el id pasado.
     */
    function get($idCategoria)
    {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
        $query->execute(array($idCategoria));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Guarda una nueva categoria en la base de datos.
     */
    public function save($nombre)
    {
        $query = $this->db->prepare('INSERT INTO categoria (descripcion) VALUES(?)');
        $query->execute([$nombre]);
        /*  var_dump($query->errorInfo());
        die(); */
    }

    public function update($tipo, $id)
    {
        $query = $this->db->prepare('UPDATE categoria SET descripcion = ? WHERE id_categoria = ?');
        $query->execute(array($tipo, $id));
        //var_dump($query->errorInfo()); die();
    }


    /*   Elimina una categoria de la BBDD según el id pasado.
        Controlar que no haya inmuebles asociados a esa categoria para poder borrar */
    function delete($idCategoria)
    {
        $query = $this->db->prepare('DELETE FROM categoria WHERE id_categoria = ?');
        $query->execute([$idCategoria]);
    }

    /**
     * Actualiza la tarea y la marca finalizada.
     */
}
