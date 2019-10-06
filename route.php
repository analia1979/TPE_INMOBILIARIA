    <?php
    require_once('controllers/inmueble.controller.php');

    require_once('controllers/login.controller.php');
    require_once('controllers/administrador.controller.php');
    require_once('Router.php');


    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');

    define("LOGIN", BASE_URL . 'login');
    define("VER", BASE_URL . 'inicio');

    /*   // parsea (separa) la url (si viene "sumar/5/8" => [sumar, 5, 8])
    $partesURL = explode('/', $_GET['action']); */

    $r = new Router();

    //Ruta por defecto.
    $r->setDefaultRoute("inmuebleController", "showInicio");

    // rutas
    $r->addRoute("inicio", "GET", "inmuebleController", "showInicio");
    $r->addRoute("login", "GET", "LoginController", "mostrarLogin");
    $r->addRoute("verificarUsuario", "POST", "LoginController", "verificarUsuario");
    $r->addRoute("admin", "GET", "AdministradorController", "showInmuebles");
    $r->addRoute("logout", "GET", "LoginController", "logout");
    $r->addRoute("editar/:ID", "GET", "AdministradorController", "cargarInmueble");
    $r->addRoute("editar", "POST", "AdministradorController", "editarInmueble");
    $r->addRoute("propiedades", "GET", "inmuebleController", "showInmuebles");
    $r->addRoute("tarea/:ID", "GET", "inmuebleController", "showInmueble");
    $r->addRoute("inmueblescategoria/:ID", "GET", "inmuebleController", "showInmuebleCategoria");
    $r->addRoute("inmueble/:ID", "GET", "inmuebleController", "showInmueble");

    //  $r->addRoute("finalizar/:ID", "GET", "TaskController", "endTask");
    // $r->addRoute("nueva", "POST", "TaskController", "addTask");

    //Ruta por defecto.
    //  $r->setDefaultRoute("inicio", "showInmuebles");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
   
    /* switch ($partesURL[0]) {
              
   
        case 'nueva':
            $controller = new inmuebleController();
            $controller->addInmueble();
            break;
        case 'eliminar':
            $controller = new inmuebleController();
            $controller->deleteInmueble($partesURL[1]);
            break;
        case 'vendida':
            $controller = new inmuebleController();
            $controller->endInmueble($partesURL[1]);
            break;
        case 'verCat':
            $controller = new categoriaController();
            $controller->showCategorias();
            break;
        case 'categoriaCat':
            $controller = new categoriaController();
            $controller->showCategorias($partesURL[1]);
            break;
        case 'nuevaCat':
            $controller = new categoriaController();
            $controller->addCategorias();
            break;
        case 'eliminarCat':
            $controller = new categoriaController();
            $controller->deleteCategorias($partesURL[1]);
            break;
        case 'home':
            $controller = new categoriaController();
            $controller->showHome();
            break;
        default:
            echo "<h1>Error 404 - Page not found </h1>";
            break;
    } */
