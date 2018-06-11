<?php

class AdministradorModel extends CI_Model {

    public function puntos() {
        return $this->db->get("punto_turistico")->result();
    }

    function tabla() {
        $sql = "select 
                    p.id_punto,
                    p.titulo,
                    p.descripcion,
                    p.latitud,
                    p.longitud
                    from punto_turistico p";
        $query = $this->db->query($sql);
        $puntos = $query->result_array();

        return $puntos;
    }

    public function insertarPunto($titulo, $descripcion, $latitud, $longitud) {
        $data = array("titulo" => $titulo, "descripcion" => $descripcion, "latitud" => $latitud, "longitud" => $longitud);
        return $this->db->insert("punto_turistico", $data);
    }

    public function editarPunto($id_punto, $titulo, $descripcion, $latitud, $longitud) {
        $data = array("id_punto" => $id_punto, "titulo" => $titulo, "descripcion" => $descripcion, "latitud" => $latitud, "longitud" => $longitud);
        $this->db->where("id_punto", $id_punto);
        return $this->db->update("punto_turistico", $data);
    }

}
