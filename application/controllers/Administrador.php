<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("AdministradorModel");
    }

    public function index() {
        if ($this->session->userdata("usuario")) {
            $this->load->view('template2/header');
            $this->load->view('administrador/home');
            $this->load->view('template2/footer');
        } else {
            redirect('login');
        }
    }

    //CARGA VISTAS DEL ADMINISTRADOR
    public function vistaPuntos() {
        //ESTA CREADA LA SESSION DEL ADMIN?
        if ($this->session->userdata("usuario")) {
            $data = $this->AdministradorModel->tabla();
            $datos['cantidad'] = count($data);
            $datos['datos'] = $data;
            $this->load->view('administrador/punto', $datos);
        } else {
            redirect('login');
        }
    }

    //CARGA LISTA DE REGISTROS DE PUNTOS TURISTICOS EN FORMATO JSON
    public function puntos() {
        echo json_encode($this->AdministradorModel->puntos());
    }

    //FUNCION QUE PERMITE INSERTAR UN NUEVO PUNTO EN LA BASE DE DATOS
    public function insertarPunto() {
        $titulo = $this->input->post("titulo");
        $descripcion = $this->input->post("descripcion");
        $latitud = $this->input->post("latitud");
        $longitud = $this->input->post("longitud");
        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            if ($this->AdministradorModel->insertarPunto($titulo, $descripcion, $latitud, $longitud)) {
                echo json_encode(array("msg" => "Punto turistico creado!"));
            } else {
                echo json_encode(array("msg" => "Ha ocurrido un error!"));
            }
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

    //FUNCION QUE PERMITE EDITAR UN PUNTO TURISTICO EN LA BASE DE DATOS
    public function editarPunto() {
        $id_punto = $this->input->post("id");
        $titulo = $this->input->post("titulo");
        $descripcion = $this->input->post("descripcion");
        $latitud = $this->input->post("latitud");
        $longitud = $this->input->post("longitud");
        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            if ($this->AdministradorModel->editarPunto($id_punto, $titulo, $descripcion, $latitud, $longitud)) {
                echo json_encode(array("msg" => "Punto turistico actualizado!"));
            } else {
                echo json_encode(array("msg" => "Ha ocurrido un error!"));
            }
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }
    
        //FUNCION QUE PERMITE ELIMINAR UN PUNTO TURISTICO EN LA BASE DE DATOS
    public function eliminarPunto() {
        $id_punto = $this->input->post("id");
        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            if ($this->AdministradorModel->eliminarPunto($id_punto)) {
                echo json_encode(array("msg" => "Punto turistico eliminado!"));
            } else {
                echo json_encode(array("msg" => "Ha ocurrido un error!"));
            }
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

}
