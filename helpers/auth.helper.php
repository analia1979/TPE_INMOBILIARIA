<?php

class AuthHelper
{
    public function __construct()
    { }

    public function login($user)
    {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['USER'] = $user;
        //$_SESSION['USERNAME'] = $user->email;
        //$_SESSION['ADMIN'] = $user->admin;


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
        if (!isset($_SESSION['USER'])) {
            header('Location: ' . LOGIN);
            die();
        }
    }
    // public function isAdmin() //verificar si el que esta logueado es admin
    // {
    //     if (session_status() != PHP_SESSION_ACTIVE) {
    //         session_start();
    //     }
    //     if (isset($_SESSION['USERNAME']))

    //         return $_SESSION['ADMIN'];


    //     return NULL;
    // }
    public function getUsuario() //verificar 
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['USER']))

            return $_SESSION['USER'];


        return NULL;
    }
    // public function getLoggedUserName()
    // {

    //     if (session_status() != PHP_SESSION_ACTIVE) {
    //         session_start();
    //     }
    //     if (isset($_SESSION['USERNAME']))

    //         return $_SESSION['USERNAME'];
    //     else return null;
    // }
}
