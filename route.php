<?php
    require_once('controllers/inmueble.controller.php');
    require_once('controllers/categorias.controller.php');

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("INICIO", BASE_URL . 'inicio');

    // si no viene una "action", definimos una por defecto
    if ($_GET['action'] == '')
        $_GET['action'] = 'inicio';

    // parsea (separa) la url (si viene "sumar/5/8" => [sumar, 5, 8])
    $partesURL = explode('/', $_GET['action']);
    
    switch ($partesURL[0]) {
        case 'inicio':
            $controller = new inmuebleController();
            $controller->showInicio();
            break;
         case 'propiedades':
            $controller = new inmuebleController();
            $controller->showInmuebles();
            break;
        case 'loginAdmin':
            $controller = new administradorController;
            $controller ->mostrarLogin();

            case 'inmueblescategoria':
            $controller= new inmuebleController();
            $controller->showInmueblesCategorias($partesURL[1]);
            break;
            case 'inmueble':
            $controller = new inmuebleController();
            $controller->showInmueble($partesURL[1]);
            break;
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
    }
    
?>