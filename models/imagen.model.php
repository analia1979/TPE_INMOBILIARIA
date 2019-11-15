<?php

class ImagenModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_inmobiliaria;charset=utf8', 'root', '');
    }

    public function addImagen($idInmueble, $name, $source)
    {

        $path = "img/" . uniqid() . "." . strtolower(pathinfo($name, PATHINFO_EXTENSION)); // creo el path de la imagen agregando el uniqid para el caso que se agreguen distintas imagenes con el mismo nombre y ademas agrego la extension usando la funcion Pathinfo_extension que devuelve la extension del archivo
        move_uploaded_file($source, $path);
        $query = $this->db->prepare('INSERT INTO imagen(path,idInmueble_fk) values(?,?)');
        $query->execute(array($path, $idInmueble));
        var_dump($query->errorInfo());
    }
    public function getImagenPorInmueble($idInmueble)
    {

        $query = $this->db->prepare('SELECT * FROM imagen where idInmueble_fk=?');
        $query->execute(array($idInmueble));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
