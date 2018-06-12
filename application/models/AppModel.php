<?php

class AppModel extends CI_Model {

    public function puntos() {
        return $this->db->get("punto_turistico")->result();
    }
    
    public function usuarios() {
        return $this->db->get("usuario")->result();
    }

}
