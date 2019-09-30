<?php
require('libs/Smarty.class.php');

class inmuebleView
{

    public function showInmuebles($inmuebles, $categorias)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assign('inmuebles', $inmuebles);
        $smarty->assign('categorias', $categorias);
        $smarty->display('template/mostrarInmuebles.tpl');
    }

    public function showError($msgError)
    {
        echo "<h1>¡¡¡ERROR!!!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

    /**
     * Construye el html que permite visualizar el detalle de un inmueble determinado.
     */
    function showInmueble($inmueble)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assign('inmueble', $inmueble);
        $smarty->assing('categoria', $categorias);
        $smarty->display('template/mostrarInmuebles.tpl');
    }

    public function showCategorias($Categorias)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assign('Categorias', $Categorias);
        $smarty->display('template/mostrarCategorias.tpl');
    }

    public function showInicio($inmuebles, $categorias)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assign('inmuebles', $inmuebles);
        $smarty->assign('categorias', $categorias);
        $smarty->display('template/inicio.tpl');
    }
}
