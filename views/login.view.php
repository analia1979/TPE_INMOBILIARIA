<?php

require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');

class LoginView
{

    private $smarty;

    public function __construct()
    {

        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
        $this->smarty->assign('userName', NULL);
        // aca se asigna el basehref
    }

    public function showLogin($categorias, $error = NULL)
    {
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('template/login.tpl');
    }
}
