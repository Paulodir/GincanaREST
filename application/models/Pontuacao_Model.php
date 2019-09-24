<?php

class Pontuacao_Model extends CI_Model {

    const table = 'pontuacao';

    public function get() {
        
        $query = $this->db->get(self::table); 
      /*$this->db->select("pontuacao.*");
        $this->db->select(",(equipe.nome) AS nome_equipe");
        $this->db->select(",(prova.nome) AS nome_prova");
        $this->db->select(",(usuario.nome) AS nome_usuario");
        $this->db->from(self::table);
        $this->db->join('equipe', 'equipe.id=pontuacao.id_equipe', 'inner');
        $this->db->join('prova', 'prova.id=pontuacao.id_prova', 'inner');
        $this->db->join('usuario', 'usuario.id=pontuacao.id_usuario', 'inner');
        $query = $this->db->get();*/
        return $query->result();
    }

    public function insert($data = array()) {
        $this->db->insert(self::table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete(self::table);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update(self::table, $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}

?>