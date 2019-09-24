<?php
    require_once('controllers/inmueble.controller.php');
    require_once('controllers/categorias.controller.php');

    // si no viene una "action", definimos una por defecto
    if ($_GET['action'] == '')
        $_GET['action'] = 'ver';

    // parsea (separa) la url (si viene "sumar/5/8" => [sumar, 5, 8])
    $partesURL = explode('/', $_GET['action']);
    
    switch ($partesURL[0]) {
        case 'ver':
            $controller = new inmuebleController();
            $controller->showInmuebles();
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