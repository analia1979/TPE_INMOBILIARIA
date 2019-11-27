<?php
include_once('models/inmueble.model.php');
include_once('views/inmueble.view.php');
include_once('models/categorias.model.php');


class InmuebleController
{
    private $model;
    private $modelCategoria;
    private $modelImagen;
    private $modelComentario;
    private $view;

    public function __construct()
    {

        $this->model = new InmuebleModel();
        $this->modelCategoria = new CategoriasModel();
        $this->modelImagen = new ImagenModel();
        $this->modelComentario = new ComentarioModel();
        $categorias = $this->modelCategoria->getAll();

        $this->view = new inmuebleView($categorias);
    }
    /**
     * Muestra la lista de inmuebles.
     */
    public function showInicio()
    {
        // obtengo inmuebles del model
        $inmuebles = $this->model->getAll();

        // se las paso a la vista
        $this->view->showInicio($inmuebles);
    }

    public function showInmuebleCategoria($params = null)
    {
        //obtengo los inmueble por categoria
        $idCategoria = $params[':ID'];
        $inmuebles = $this->model->getInmueblePorCategoria($idCategoria);
        //  $categorias = $this->modelCategoria->getAll();
        $this->view->showInmueblePorCategoria($inmuebles);
    }
    public function showInmueble($params = null)
    {
        $idInmueble = $params[':ID'];
        $inmueble = $this->model->getInmueble($idInmueble);
        $inmuebles = $this->model->getAll();


        if ($inmueble) { // si existe el inmueble
            $imagenes = $this->modelImagen->getImagenPorInmueble($idInmueble);
            $promedio = $this->modelComentario->getPromedio($idInmueble);

            $prom = number_format($promedio->promedio, 2, ',', ' ');
            $this->view->showInmueble($inmueble, $inmuebles, $imagenes, $prom);
        } else
            $this->view->showError('El inmueble no existe');
    }
    public function showInmuebles()
    {
        // obtengo inmuebles del model
        $inmuebles = $this->model->getAll();
        // se las paso a la vista
        //   $categorias = $this->modelCategoria->getAll();
        $this->view->showInmuebles($inmuebles);
    }
}
