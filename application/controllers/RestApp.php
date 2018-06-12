<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RestApp extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("AppModel");
    }

    //CARGA LISTA DE REGISTROS DE PUNTOS TURISTICOS EN FORMATO JSON
    public function puntos() {
        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            echo json_encode($this->AppModel->puntos());
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

    //CARGA LISTA DE REGISTROS DE USUARIOS EN FORMATO JSON
    public function usuarios() {
        $clave = $this->input->post("key");
        
        if ($clave === "3F!9#") {
            echo json_encode($this->AppModel->usuarios());
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

}
