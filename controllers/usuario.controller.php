 <?php
    include_once('models/inmueble.model.php');
    include_once('views/usuario.view.php');
    include_once('models/categorias.model.php');

    class usuarioController
    {

        private $modelInmueble;
        private $modelCategoria;
        private $view;

        public function __construct()
        {  // barrera para usuario logueado
            $this->checkLoggedIn();
            $this->modelInmueble = new inmuebleModel();
            $this->modelCategoria = new categoriasModel();
            $this->view = new usuarioView();
        }


        private function checkLoggedIn()
        {
            session_start();
            if (!isset($_SESSION['ID_USER'])) {
                header('Location: ' . LOGIN);
                die();
            }
        }
        /**
         * Muestra la lista de inmuebles.
         */

        public function showInmuebles()
        {
            // obtengo inmuebles del model
            $inmuebles = $this->modelInmueble->getAll();
            $categorias = $this->modelCategoria->getAll();

            // se las paso a la vista
            $this->view->showInmuebles($inmuebles, $categorias);
        }

        public function showInmueble($inmueble)
        {
            $inmueble = $this->modelInmueble->get($inmueble);

            if ($inmueble) // si existe la tarea
                $this->view->showInmueble($inmueble);
            else
                $this->view->showError('El inmueble no existe');
        }

        /**
         * Agrega un nuevo inmueble a la lista.
         */
        public function addInmueble()
        {

            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];

            if (!empty($precio) && !empty($descripcion) && !empty($categoria)) {
                $this->modelInmueble->save($precio, $descripcion, $categoria);
                header("Location: ver");
            } else {
                $this->view->showError("Faltan datos obligatorios");
            }
        }

        public function endInmueble($idInmueble)
        {
            $this->modelInmueble->end($idInmueble);
            header("Location: admin");
        }

        public function deleteInmueble($idInmueble)
        {
            $this->modelInmueble->delete($idInmueble);
            header("Location: inicio");
        }
    }
