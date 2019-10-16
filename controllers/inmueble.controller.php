<?php
include_once('models/inmueble.model.php');
include_once('views/inmueble.view.php');
include_once('models/categorias.model.php');


class inmuebleController
{
    private $model;
    private $modelCategoria;
    private $view;

    public function __construct()
    {

        $this->model = new inmuebleModel();
        $this->modelCategoria = new categoriasModel();
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
        //   $categorias = $this->modelCategoria->getAll();
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

        if ($inmueble) // si existe el inmueble
            $this->view->showInmueble($inmueble, $inmuebles);
        else
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
