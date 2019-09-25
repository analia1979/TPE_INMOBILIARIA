<?php
include_once('models/categorias.model.php');
include_once('views/inmueble.view.php');

class categoriaController {

    private $model;
    private $view;
    private $modelCategoria;

    public function __construct() {
        $this->model = new categoriasModel();
        $this->view = new inmuebleView();
        
    }

    /**
     * Muestra la lista de tareas.
     */
    public function showCategorias() {
        // obtengo tareas del model
        $Categorias = $this->model->getAll();

        // se las paso a la vista
        $this->view->showCategorias($Categorias);
    }

    public function showCategoria($idCategorias) {
          $Categorias = $this->model->get($idCategorias);

          if ($Categorias) // si existe la tarea
            $this->view->showCategorias($Categorias);
        else
            $this->view->showError('La categoria no existe');
    }

    /**
     * Agrega una nueva tarea a la lista.
     */
    public function addCategorias() {

        $nombre = $_POST['nombre'];
        
   
        if (!empty($categoria)) {
           $this->model->save($nombre);
           header("Location: ver");
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }

    public function endCategorias($idCategorias) {
        $this->model->end($idCategorias);
        header("Location: ../ver");
    }

    public function deleteTask($idCategorias) {
        $this->model->delete($idCategorias);
        header("Location: ../ver");
    }

    public function showHome() {
        $inmuebles = $this->model->getAll();
        $categorias = $this->model->getAll();

        $this->view->showHome($inmuebles, $categorias);
    }
}