<?php
require('libs/Smarty.class.php');

class inmuebleView
{
    private $smarty;
    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }


    public function showInmuebles($inmuebles, $categorias)
    {

        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmuebles', $inmuebles);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('template/mostrarInmuebles.tpl');
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
