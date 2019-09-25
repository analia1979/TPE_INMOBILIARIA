 <?php
include_once('models/inmueble.model.php');
include_once('views/inmueble.view.php');
include_once('models/categorias.model.php');

class administradorController {

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
    public function mostrarLogin(){

        

    }
     public function showInmuebles() {
        // obtengo inmuebles del model
        $inmuebles = $this->model->getAll();
        $categorias = $this->modelCategoria ->getAll();

        // se las paso a la vista
        $this->view->showInmuebles($inmuebles, $categorias);
    }

    public function showInmueble($inmueble) {
          $inmueble = $this->model->get($inmueble);

          if ($inmueble) // si existe la tarea
            $this->view->showInmueble($inmueble);
        else
            $this->view->showError('El inmueble no existe');
    }

    /**
     * Agrega un nuevo inmueble a la lista.
     */
    public function addInmueble() {
        
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
   
        if (!empty($precio) && !empty($descripcion) && !empty($categoria)) {
           $this->model->save($precio, $descripcion, $categoria);
           header("Location: ver");
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }

    public function endInmueble($idInmueble) {
        $this->model->end($idInmueble);
        header("Location: ../ver");
    }

    public function deleteInmueble($idInmueble) {
        $this->model->delete($idInmueble);
        header("Location: ../ver");
    }

}