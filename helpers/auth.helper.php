<?php

class AuthHelper
{
    public function __construct()
    { }

    public function login($user)
    {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->email;
        $_SESSION['ADMIN'] = $user->admin;
        //var_dump($_SESSION);
        // die();
        //guardar el tipodeUsuario
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

    public function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . LOGIN);
            die();
        }
    }

    public function getLoggedUserName()
    {
        //echo $_SESSION['USERNAME'];
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['USERNAME'])) return $_SESSION['USERNAME'];
        else return null;
    }
}
