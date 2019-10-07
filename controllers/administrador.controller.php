<?php
include_once('models/inmueble.model.php');
include_once('views/administrador.view.php');
include_once('models/categorias.model.php');
include_once('helpers/auth.helper.php');

class AdministradorController
{

    private $modelInmueble;
    private $modelCategoria;
    private $view;

    public function __construct()
    {  // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->modelInmueble = new inmuebleModel();
        $this->modelCategoria = new categoriasModel();
        $this->view = new administradorView();
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

    public function showInmueble($inmueble, $categorias)
    {
        $inmueble = $this->modelInmueble->get($inmueble);
        $categorias = $this->modelCategoria->getAll();

        if ($inmueble) // si existe el inmueble
            $this->view->showInmueble($inmueble, $categorias);
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
            header("Location: " . VER);
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }

    public function cargarInmueble($params = null)
    {
        $idinmueble = $params[':ID'];
        $inmueble = $this->modelInmueble->getInmueble($idinmueble);

        $categorias = $this->modelCategoria->getAll();
        $this->view->cargarInmueble($inmueble, $categorias);
    }
    public function editarInmueble()
    {

        $precio = $_POST['precio'];
        $idCategoria = $_POST['idCategoria'];
        $descripcion = $_POST['descripcion'];
        $idinmueble = $_POST['idInmueble'];
        //var_dump($_POST);
        if (!empty($idinmueble) && !empty($precio) && !empty($idCategoria) && !empty($descripcion)) {
            var_dump($_POST);
            $this->modelInmueble->editarInmueble($precio, $idCategoria, $descripcion, $idinmueble,);
            header("Location: " . ADMIN);
        }
    }

    public function deleteInmueble($params = null)
    {
        $idInmueble = $params[':ID'];
        var_dump($idInmueble);
        if (isset($idInmueble)) {
            $this->modelInmueble->delete($idInmueble);

            header("Location: " . ADMIN);
        } else {
            $this->view->showError();
        }
    }
}
