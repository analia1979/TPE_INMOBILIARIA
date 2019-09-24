<?php
require('libs/Smarty.class.php');

class categoriasView {

public function showCategorias($categorias) {
   $smarty = new Smarty();
   $smarty->assign('titulo', "Inmobiliaria");
   $smarty->assign('categorias', $categorias);
   $smarty->display('template/mostrarCategorias.tpl');
     
    }
}