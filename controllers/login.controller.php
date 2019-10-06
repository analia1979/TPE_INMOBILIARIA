<?php
include_once('views/login.view.php');
include_once('models/usuario.model.php');
include_once('models/categorias.model.php');
include_once('helpers/auth.helper.php');

class LoginController
{

    private $view;
    private $modelCategoria;
    private $modelUsuario;
    private $authHelpers;

    public function __construct()
    {
        $this->view = new LoginView();
        $this->modelCategoria = new categoriasModel();
        $this->modelUsuario = new UsuarioModel();
        $this->authHelpers = new AuthHelper();
    }

    public function mostrarLogin()
    {
        // obtengo las categorias 
        $categorias = $this->modelCategoria->getAll();

        // se las paso a la vista
        $this->view->showLogin($categorias);
    }
    public function verificarUsuario()
    {
        $categorias = $this->modelCategoria->getAll();

        //obtengo el mail y password que enviaron desde el formulario

        $email = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->modelUsuario->getUsuario($email);

        if (!empty($user) && password_verify($password, $user->password)) {
            //encontro un usuario en la bd y la clave coincide
            //inicio la sesion y logueo al usuario

            $this->authHelpers->login($user);
            header('Location: admin');
        } else {

            $this->view->showLogin($categorias, "Login incorrecto");
        }
    }
    public function logout()
    {

        $this->authHelpers->logout();
        header('Location:' . LOGIN);
    }
}
