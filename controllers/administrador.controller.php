<?php
include_once('models/inmueble.model.php');
include_once('views/administrador.view.php');
include_once('models/categorias.model.php');
include_once('models/imagen.model.php');
include_once('models/usuario.model.php');
include_once('models/comentario.model.php');
include_once('helpers/auth.helper.php');

class AdministradorController
{

    private $modelInmueble;
    private $modelCategoria;
    private $modelImagen;
    private $modelUsuario;
    private $modelComentario;
    private $view;
    private $authHelper;
    private $user;

    public function __construct()
    {  // barrera para usuario logueado
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        $this->user = $this->authHelper->getUsuario();
        $this->modelInmueble = new InmuebleModel();
        $this->modelImagen = new ImagenModel();
        $this->modelCategoria = new CategoriasModel();
        $this->modelUsuario = new UsuarioModel();
        $this->modelComentario = new ComentarioModel();
        $categorias = $this->modelCategoria->getAll();
        $this->view = new administradorView($categorias, $this->user);
    }



    /**
     * Muestra la lista de inmuebles.
     */

    public function showInmuebles()
    {
        //solo si es admin puede ver sino poner barrera

        // obtengo inmuebles del model

        if ($this->user->admin == 1) {
            $inmuebles = $this->modelInmueble->getAll();

            // se las paso a la vista
            $this->view->showInmuebles($inmuebles);
        } else
            header('Location:' . VER);
    }


    public function showInmueble($params = null)
    {
        $idInmueble = $params[':ID'];
        $inmueble = $this->modelInmueble->getInmueble($idInmueble);

        if ($inmueble) { // si existe el inmueble
            $imagenes = $this->modelImagen->getImagenPorInmueble($idInmueble);
            $this->view->showInmueble($inmueble, $imagenes);
        } else
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

        if ($this->user->admin == 1) {
            $inmuebles = $this->modelInmueble->getAll();

            $this->view->showCategorias($inmuebles);
        } else    header('Location:' . VER);
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

        if ($this->user->admin == 1) {
            $inmuebles = $this->modelInmueble->getAll();
            $id_categoria = $params[':ID'];
            $categoria = $this->modelCategoria->get($id_categoria);
            $this->view->showEditarCategoria($inmuebles, $categoria);
        } else header('Location:' . VER);
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

        if ($this->user->admin == 1) {
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
        } else header('Location:' . VER);
    }
    public function showUsuarios()
    {

        if ($this->user->admin == 1) {
            $usuarios = $this->modelUsuario->getAll();

            // se las paso a la vista
            $this->view->showUsuarios($usuarios);
        } else
            header('Location:' . VER);
    }
    public function actualizarUsuario($params = null)
    {

        $idUsuario = $params[':ID'];
        $user = $this->modelUsuario->getUsuarioID($idUsuario);
        if ($user->admin == 1) {
            $this->modelUsuario->updateUsuario($user->id, 0);
        } else {
            $this->modelUsuario->updateUsuario($user->id, 1);
        }
        header('Location:' . USUARIOS);
    }
    public function eliminarUsuario($params = null)
    {

        $idUsuario = $params[':ID'];
        //primero debo verificar que el usuario no tenga comentarios asociados
        $cantComentarios = $this->modelComentario->getComentariosPorUsuario($idUsuario);
        if ($cantComentarios->cantidad == 0) {
            $this->modelUsuario->deleteUsuario($idUsuario);
            header('Location:' . USUARIOS);
        } else
            $this->view->showError('El usuario no se puede borrar porque tiene comentarios asociados');
    }
}
