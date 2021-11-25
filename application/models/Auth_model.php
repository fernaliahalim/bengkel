<?php

class Auth_model extends CI_Model{
    public function login($email, $password){
        $sql = "SELECT * FROM user
                WHERE email = ? AND password = ?;";
        return $this->db->query($sql, array($email, $password));
    }

    public function check_email($email){
        $sql = "SELECT * FROM user
                WHERE email = ?;";
        return $this->db->query($sql, $email); 
    }

    public function get_user_by_iduser($id_user){
        $sql = "SELECT * FROM user
                WHERE id_user = ?;";
        return $this->db->query($sql, $id_user);
    }

    public function update_user_by_iduser($data){
        $sql = "UPDATE user
                SET nama = ?,
                    password = ?,
                    no_telpon = ?
                WHERE id_user = ?;";
        return $this->db->query($sql, $data);
    }
}