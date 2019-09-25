<?php
require('libs/Smarty.class.php');

class inmuebleView {

    public function showInmuebles($inmuebles,$categorias) {
   $smarty = new Smarty();
   $smarty->assign('titulo', "Inmobiliaria");
   $smarty->assign('inmuebles', $inmuebles);
   $smarty->assign('categorias', $categorias);
   $smarty->display('template/inicio.tpl');
     
    }

    public function showError($msgError) {
        echo "<h1>¡¡¡ERROR!!!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

    /**
     * Construye el html que permite visualizar el detalle de un inmueble determinada.
     */
    function showInmueble($inmueble) {

        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assign('inmueble', $inmueble);
         $smarty->display('template/mostrarInmueble.tpl');
    }
        /**Construye el template que permite visualizar todos los inmubles de un determinada categoria */
   /**  public function showInmueblePorCategoria($inmuebles){
      *  $smarty = new Smarty();
     *   $smarty-> assign('titulo',"Inmobiliaria");
      *  $smarty->assing('inmuebles',$inmuebles);
     *   $smarty->display('template/mostrarInmueblePorCategoria.tpl');

   * }*/

    public function showCategorias($Categorias) {
        $smarty = new Smarty();
        $smarty->assign('titulo', "Inmobiliaria");
        $smarty->assign('Categorias', $Categorias);
        $smarty->display('template/mostrarCategorias.tpl');
          
         }

         public function showHome() {
            $smarty = new Smarty();
            $smarty->assign('titulo', "Inmobiliaria");
            $smarty->display('template/mostrarHome.tpl');
              
             }
}
