<?php

class Teknisi_model extends CI_Model{
    public function get_all_teknisi(){
        $sql = "SELECT * FROM teknisi;";
        return $this->db->query($sql);
    }
}