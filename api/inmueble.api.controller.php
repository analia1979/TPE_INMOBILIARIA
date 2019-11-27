<?php

require_once("./models/comentario.model.php");
require_once("./api/json.view.php");
include_once('views/inmueble.view.php');

class InmuebleApiController
{


    private $modelComentario;
    private $view;
    private $data;


    public function __construct()
    {

        $this->modelComentario = new ComentarioModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData()
    {
        return json_decode($this->data);
    }

    public function getComentariosPorInmueble($params = null)
    {
        $id = $params[':ID'];

        $comentarios = $this->modelComentario->getComentariosPorinmueble($id);

        $this->view->response($comentarios, 200);
    }
    public function addcomentario()
    {
        $data = $this->getData();

        $comentario = $this->modelComentario->save($data->texto, $data->puntaje, $data->id_inmueble_fk, $data->id_usuario_fk);
        $this->view->response($comentario, 200);
    }


    public function deleteComentario($params = null)
    {

        $idComentario = $params[':ID'];
        //obtengo el comentario para asegurarme de borrar un comentario que existe;
        $comentario = $this->modelComentario->getComentario($idComentario);
        if (isset($comentario)) {
            // el comentario existe
            $this->modelComentario->delete($idComentario);
            $this->view->response($comentario, 200);
        } else
            $this->view->response($comentario, 404);
    }
}
