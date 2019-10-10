<?php

class InmuebleModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
    }

    /**
     * Obtiene la lista de inmuebles dejando en primer lugar las que no fueron vendidas.
     */
    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM inmueble ORDER BY vendida ASC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retorna una inmueble según el id pasado.
     */
    function getInmueble($idInmueble)
    {
        $query = $this->db->prepare('SELECT inmueble.id_inmueble, inmueble.descripcion as descripcion,precio,categoria.descripcion as tipo,inmueble.idCategoria as idCategoria
        FROM inmueble join categoria on idCategoria=id_categoria  WHERE id_inmueble = ?');
        $query->execute(array($idInmueble));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Guarda un inmueble en la base de datos
     * Tiene que cumplir el mismo orden lo que llega como parametro con lo que este en el insert into
     */
    public function save($descripcion, $precio, $categoria)
    {
        $query = $this->db->prepare('INSERT INTO inmueble (descripcion, precio, idCategoria,vendida) VALUES (?,?,?,?)');
        $query->execute(array($descripcion, $precio, $categoria, 0));
        var_dump($query->errorInfo());
        die();
    }

    public function editarInmueble($precio, $idCategoria, $descripcion, $idinmueble)
    {
        $query = $this->db->prepare('UPDATE inmueble SET precio=?, idCategoria=?, descripcion=? WHERE id_inmueble=?');
        $query->execute(array($precio, $idCategoria, $descripcion, $idinmueble));
        //   var_dump($query->(errorInfor());die() para ver el error de sql
    }

    /**
     * Elimina un inmueble de la BBDD según el id pasado.
     */
    public function delete($idInmueble)
    {
        $query = $this->db->prepare('DELETE FROM inmueble WHERE id_inmueble = ?');
        $query->execute([$idInmueble]);
    }

    /**
     * Actualiza la tarea y la marca finalizada.
     */
    function end($idInmueble)
    {
        $query = $this->db->prepare('UPDATE inmueble SET vendida = 1 WHERE id_inmueble = ?');
        $query->execute([$idInmueble]);
    }
    function getInmueblePorCategoria($idCategoria)
    {

        $query = $this->db->prepare('SELECT * FROM inmueble join categoria on  idCategoria=id_Categoria where idCategoria=?');
        $query->execute(array($idCategoria));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
