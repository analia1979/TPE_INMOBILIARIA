<?php
require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');

class AdministradorView
{
    private $smarty;

    public function __construct()
    {
        $authHelper = new AuthHelper();
        $userName = $authHelper->getLoggedUserName();
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
        $this->smarty->assign('userName', $userName);
    }


    public function showInmuebles($inmuebles, $categorias)
    {

        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmuebles', $inmuebles);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('template/mostrarForm.tpl');
    }

    public function showError()
    {
        echo "<h1>¡¡¡ERROR!!!</h1>";
        //echo "<h2>{$msgError}</h2>";
    }

    /**
     * Construye el html que permite visualizar el detalle de un inmueble determinada.
     */
    function showInmueble($inmueble, $categorias)
    {


        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmueble', $inmueble);
        $this->smarty->assign('categoria', $categorias);
        $this->smarty->display('template/mostrarInmueble.tpl');
    }

    function cargarInmueble($inmueble, $categorias)
    {

        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmueble', $inmueble);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('template/editarInmueble.tpl');
    }

    /**Construye el template que permite visualizar todos los inmuebles de un determinada categoria */

    public function showInmueblePorCategoria($inmuebles)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assing('inmuebles', $inmuebles);
        $smarty->display('template/mostrarInmueblePorCategoria.tpl');
    }

    public function showCategorias($Categorias)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assign('Categorias', $Categorias);
        $smarty->display('template/mostrarCategorias.tpl');
    }

    public function showHome()
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->display('template/mostrarHome.tpl');
    }
}
