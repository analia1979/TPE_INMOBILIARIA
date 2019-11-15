<?php
include_once('models/inmueble.model.php');
include_once('views/administrador.view.php');
include_once('models/categorias.model.php');
include_once('models/imagen.model.php');
include_once('helpers/auth.helper.php');

class AdministradorController
{

    private $modelInmueble;
    private $modelCategoria;
    private $modelImagen;
    private $view;

    public function __construct()
    {  // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->modelInmueble = new InmuebleModel();
        $this->modelImagen = new ImagenModel();
        $this->modelCategoria = new CategoriasModel();
        $categorias = $this->modelCategoria->getAll();
        $this->view = new administradorView($categorias);
    }



    /**
     * Muestra la lista de inmuebles.
     */

    public function showInmuebles()
    {
        // obtengo inmuebles del model
        $inmuebles = $this->modelInmueble->getAll();

        // se las paso a la vista
        $this->view->showInmuebles($inmuebles);
    }

    public function showInmueble($inmueble)
    {
        $inmueble = $this->modelInmueble->get($inmueble);
        // $categorias = $this->modelCategoria->getAll();

        if ($inmueble) // si existe el inmueble
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
        $imagenes = $_FILES; // guarda las imagenes para pasar por parametro;
        //  var_dump($imagenes);
        //die();

        if (!empty($precio) && !empty($descripcion) && !empty($categoria)) {
            //guardo el producto y luego me retorna el id para guadar las imagenes de ese producto
            $inmuebleId = $this->modelInmueble->save($precio, $descripcion, $categoria);

            //debo recorrer el array de imagenes para guardarlas en el modelo imagenes
            foreach ($imagenes['imagenes']['tmp_name'] as $key => $tmp_name) {
                // var_dump($key);
                //die();
                if ($_FILES['imagenes']['type'][$key] == 'image/jpg' || $_FILES['imagenes']['type'][$key] == 'image/png' || $_FILES['imagenes']['type'][$key] == 'image/jpeg') {

                    $source = $tmp_name; // me guardo el paht que asigna $_files

                    $name = $_FILES['imagenes']['name'][$key]; // me guardo el nombre del archivo


                    $this->modelImagen->addImagen($inmuebleId, $name, $source);
                }
            }
            header("Location: " . ADMIN);
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }

    public function cargarInmueble($params = null)
    {
        $idinmueble = $params[':ID'];
        $inmueble = $this->modelInmueble->getInmueble($idinmueble);
        if ($inmueble) {
            $imagenes = $this->modelImagen->getImagenPorInmueble($idinmueble);
            $this->view->cargarInmueble($inmueble, $imagenes);
        }
    }
    public function editarInmueble()
    {

        $precio = $_POST['precio'];
        $idCategoria = $_POST['idCategoria'];
        $descripcion = $_POST['descripcion'];
        $idinmueble = $_POST['idInmueble'];
        //var_dump($_POST);
        if (!empty($idinmueble) && !empty($precio) && !empty($idCategoria) && !empty($descripcion)) {
            //  var_dump($_POST);
            $this->modelInmueble->editarInmueble($precio, $idCategoria, $descripcion, $idinmueble);
            header("Location: " . ADMIN);
        } else {
            $this->view->showError('FALTAN DATOS OBLIGATORIOS');
        }
    }

    public function marcarVendida($params = null)
    {
        $idInmueble = $params[':ID'];
        $this->modelInmueble->updateVendida($idInmueble);
        header("Location: " . ADMIN);
    }

    public function deleteInmueble($params = null)
    {
        $idInmueble = $params[':ID'];
        //  var_dump($idInmueble);
        if (isset($idInmueble)) {
            $this->modelInmueble->delete($idInmueble);

            header("Location: " . ADMIN);
        } else {
            $this->view->showError('OCURRIO UN ERROR AL BORRAR');
        }
    }
    public function showCategorias()
    {

        $inmuebles = $this->modelInmueble->getAll();

        $this->view->showCategorias($inmuebles);
    }

    public function addCategorias()
    {
        $nombre = $_POST['nombre'];

        if (!empty($nombre)) {
            $this->modelCategoria->save($nombre);
            header("Location: " .  ADMINCAT);
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }

    public function editarCategoria($params = null)
    {

        $inmuebles = $this->modelInmueble->getAll();
        $id_categoria = $params[':ID'];
        $categoria = $this->modelCategoria->get($id_categoria);
        $this->view->showEditarCategoria($inmuebles, $categoria);
    }

    public function modificarCategoria()
    {
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];
        if (!empty($tipo)) {
            $this->modelCategoria->update($tipo, $id);
            header("Location: " . ADMINCAT);
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }
    public function eliminarCategoria($params = null)
    {
        $idCategoria = $params[':ID'];

        if (isset($idCategoria)) {
            $cantidadInmuebles = $this->modelInmueble->getInmuebleCategoria($idCategoria);

            if ($cantidadInmuebles->cantidad > 0) { //si hay inmuebles asociados no puedo borrar

                $this->view->showError('NO SE PUEDE BORRAR LA CATEGORIA HAY INMUEBLES ASOCIADOS A LA CATEGORIA.');
            } else {
                $this->modelCategoria->delete($idCategoria);

                header("Location: " . ADMINCAT);
            }
        }
    }
}
