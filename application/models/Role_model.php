<?php

class Role_model extends CI_Model{
    public function get_all_role(){
        $sql = "SELECT * FROM user_role;";
        return $this->db->query($sql);
    }
}