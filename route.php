    <?php
    require_once('controllers/inmueble.controller.php');

    require_once('controllers/login.controller.php');
    require_once('controllers/administrador.controller.php');
    require_once('Router.php');


    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');

    define("LOGIN", BASE_URL . 'login');
    define("VER", BASE_URL . 'inicio');
    define("ADMIN", BASE_URL . 'admin');
    define("ADMINCAT", BASE_URL . 'verCat');

    /*   // parsea (separa) la url (si viene "sumar/5/8" => [sumar, 5, 8])
    $partesURL = explode('/', $_GET['action']); */

    $r = new Router();

    //Ruta por defecto.
    $r->setDefaultRoute("inmuebleController", "showInicio");

    // rutas
    $r->addRoute("inicio", "GET", "InmuebleController", "showInicio");
    $r->addRoute("login", "GET", "LoginController", "mostrarLogin");
    $r->addRoute("verificarUsuario", "POST", "LoginController", "verificarUsuario");
    $r->addRoute('registrarUsuario', "POST", "LoginController", "registrarUsuario");
    $r->addRoute("admin", "GET", "AdministradorController", "showInmuebles");
    $r->addRoute("logout", "GET", "LoginController", "logout");
    $r->addRoute("editar/:ID", "GET", "AdministradorController", "cargarInmueble");
    $r->addRoute("editar", "POST", "AdministradorController", "editarInmueble");
    $r->addRoute("eliminar/:ID", "GET", "AdministradorController", "deleteInmueble");
    $r->addRoute("propiedades", "GET", "InmuebleController", "showInmuebles");
    $r->addRoute("inmueblescategoria/:ID", "GET", "inmuebleController", "showInmuebleCategoria");
    $r->addRoute("inmueble/:ID", "GET", "InmuebleController", "showInmueble");
    $r->addRoute("nueva", "POST", "AdministradorController", "addInmueble");
    $r->addRoute("verCat", "GET", "AdministradorController", "showCategorias");
    $r->addRoute("nuevaCat", "POST", "AdministradorController", "addCategorias");
    $r->addRoute("editarCat/:ID", "GET", "AdministradorController", "editarCategoria");
    $r->addRoute("modificarCat", "POST", "AdministradorController", "modificarCategoria");
    $r->addRoute("eliminarCat/:ID", "GET", "AdministradorController", "eliminarCategoria");
    $r->addRoute("vendida/:ID", "GET", "AdministradorController", "marcarVendida");




    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
