<?php
require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');

class AdministradorView
{
    private $smarty;

    public function __construct($categorias, $user)
    {

        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('titulo', "INMOBILIARIA BOLIVAR");
    }


    public function showInmuebles($inmuebles)
    {


        $this->smarty->assign('inmuebles', $inmuebles);
        $this->smarty->display('template/mostrarForm.tpl');
    }

    public function showError($error = null)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/error.tpl');
    }

    /**
     * Construye el html que permite visualizar el detalle de un inmueble determinada.
     */
    function showInmueble($inmueble, $imagenes)
    {
        $this->smarty->assign('inmueble', $inmueble);
        $this->smarty->assign('imagenes', $imagenes);
        $this->smarty->display('template/mostrarInmueble.tpl');
    }
    /**Construye el template para editar un inmueble */
    function cargarInmueble($inmueble, $imagenes)
    {
        $this->smarty->assign('inmueble', $inmueble);
        $this->smarty->assign('imagenes', $imagenes);
        $this->smarty->display('template/editarInmueble.tpl');
    }

    /**Construye el template que permite visualizar todos los inmuebles de un determinada categoria */

    public function showInmueblePorCategoria($inmuebles)
    {

        $this->smarty->assing('inmuebles', $inmuebles);
        $this->smarty->display('template/mostrarInmueblePorCategoria.tpl');
    }

    public function showCategorias($inmuebles)
    {

        // $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('inmuebles', $inmuebles);
        $this->smarty->display('template/mostrarCategorias.tpl');
    }

    public function showEditarCategoria($inmuebles, $categoria)
    {
        // $this->smarty->assign('titulo', "Inmobiliaria");
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('inmuebles', $inmuebles);
        $this->smarty->display('template/mostrarEditarCategorias.tpl');
    }

    public function showUsuarios($usuarios)
    {

        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display('template/mostrarUsuarios.tpl');
    }
}
