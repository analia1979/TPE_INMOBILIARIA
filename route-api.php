<?php
require_once('Router.php');
require_once('./api/inmueble.api.controller.php');

// CONSTANTES PARA RUTEO
define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');

$router = new Router();

// rutas

$router->addRoute("/inmuebles/:ID/comentarios", "GET", "InmuebleApiController", "getComentariosPorinmueble");
$router->addRoute("/comentarios", "POST", "InmuebleApiController", "addcomentario");
$router->addRoute("/comentarios/:ID", "DELETE", "InmuebleApiController", "deleteComentario");
//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
