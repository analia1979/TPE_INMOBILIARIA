<?php

class InmuebleModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
    }

    /**
     * Obtiene la lista de inmuebles dejando en primer lugar las que no fueron vendidas.
     */
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM inmueble ORDER BY vendida ASC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retorna una tarea según el id pasado.
     */
    function get($idInmueble) {
        $query = $this->db->prepare('SELECT * FROM inmueble WHERE id_inmueble = ?');
        $query->execute(array($idInmueble));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Guarda un inmueble en la base de datos
     * Tiene que cumplir el mismo orden lo que llega como parametro con lo que este en el insert into
     */
    public function save($descripcion, $precio, $categoria) {
        $query = $this->db->prepare('INSERT INTO inmueble (descripcion, precio, idCategoria,vendida) VALUES (?,?,?,?)');
        $query->execute(array($descripcion, $precio, $categoria,0)); 
        
    }

        /**
     * Elimina una tarea de la BBDD según el id pasado.
     */
    function delete($idInmueble) {
        $query = $this->db->prepare('DELETE FROM inmueble WHERE id_inmueble = ?');
        $query->execute([$idInmueble]); 
    }

    /**
     * Actualiza la tarea y la marca finalizada.
     */
    function end($idInmueble) {
        $query = $this->db->prepare('UPDATE inmueble SET vendida = 1 WHERE id_inmueble = ?');
        $query->execute([$idInmueble]);
    }

  


}