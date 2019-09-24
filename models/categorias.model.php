<?php

class categoriasModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
    }

    /**
     * Obtiene la lista de categorias
     */
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM categoria ORDER BY id_categoria ASC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retorna una tarea según el id pasado.
     */
    function get($idCategorias) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
        $query->execute(array($idCategorias));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Guarda una tarea en la base de datos.
     */
    public function save($nombre) {
        $query = $this->db->prepare('INSERT INTO categoria(nombre) VALUES(?,?,?,0)');
        $query->execute([$nombre]); 
    }

        /**
     * Elimina una tarea de la BBDD según el id pasado.
     */
    function delete($idCategoria) {
        $query = $this->db->prepare('DELETE FROM categoria WHERE id_categoria = ?');
        $query->execute([$idCategoria]); 
    }

    /**
     * Actualiza la tarea y la marca finalizada.
     */
    

}