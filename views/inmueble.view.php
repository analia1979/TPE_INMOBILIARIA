<?php
require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');

class inmuebleView
{
    private $smarty;

    public function __construct($categorias)
    {
        $authHelper = new AuthHelper();
        $user = $authHelper->getUsuario();
        // $admin = $authHelper->isAdmin();
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
        $this->smarty->assign('user', $user);
        //$this->smarty->assign('admin', $admin);
        $this->smarty->assign('categorias', $categorias);
    }


    public function showInmuebles($inmuebles)
    {

        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmuebles', $inmuebles);
        //$this->smarty->assign('categorias', $categorias);
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
    function showInmueble($inmueble, $inmuebles, $imagenes, $promedio)
    {
        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmueble', $inmueble);
        $this->smarty->assign('inmuebles', $inmuebles);
        $this->smarty->assign('imagenes', $imagenes);
        $this->smarty->assign('promedio', $promedio);
        $this->smarty->display('template/viewInmueble.tpl');
    }

    public function showCategorias($Categorias)
    {

        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('Categorias', $Categorias);
        $this->smarty->display('template/mostrarCategorias.tpl');
    }

    public function showInicio($inmuebles)
    {
        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmuebles', $inmuebles);
        //$this->smarty->assign('categorias', $categorias);
        $this->smarty->display('template/inicio.tpl');
    }

    public function showInmueblePorCategoria($inmuebles)
    {
        $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmuebles', $inmuebles);
        // $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('template/mostrarInmuebles.tpl');
    }
}
