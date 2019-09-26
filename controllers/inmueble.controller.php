<?php
include_once('models/inmueble.model.php');
include_once('views/inmueble.view.php');
include_once('models/categorias.model.php');

class inmuebleController {

    private $model;
    private $modelCategoria;
    private $view;

    public function __construct() {
        $this->model = new inmuebleModel();
        $this->modelCategoria = new categoriasModel();
        $this->view = new inmuebleView();
    }

    /**
     * Muestra la lista de inmuebles.
     */
     public function showInicio() {
        // obtengo inmuebles del model
        $inmuebles = $this->model->getAll();
        $categorias = $this->modelCategoria ->getAll();
        // se las paso a la vista
        $this->view->showInicio($inmuebles, $categorias);
    }
    
    public function showInmuebleCategoria($idCategoria){
            //obtengo los inmueble por categoria
            $inmuebles= $this->model->getInmueblePorCategoria($idCategoria);
            $this->view->showInmueblePorCategoria($inmuebles);

    }
    public function showInmueble($inmueble) {
          $inmueble = $this->model->get($inmueble);

          if ($inmueble) // si existe la tarea
            $this->view->showInmueble($inmueble);
        else
            $this->view->showError('El inmueble no existe');

      
    }
     public function showInmuebles() {
        // obtengo inmuebles del model
        $inmuebles = $this->model->getAll();
        // se las paso a la vista
        $categorias = $this->modelCategoria ->getAll();
        $this->view->showInmuebles($inmuebles, $categorias);
    }

    

}