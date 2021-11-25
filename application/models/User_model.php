<?php

class User_model extends CI_Model{
    public function get_all_user(){
        $sql = "SELECT user.*,
                       user_role.role_name
                FROM user
                JOIN user_role ON user_role.id_role = user.id_role;";
        return $this->db->query($sql);
    }

    public function add_user($data){
        $sql = "INSERT INTO user(nama, email, password, no_telpon, id_role)
                VALUES(?, ?, ?, ?, ?);";
        return $this->db->query($sql, $data);
    }

    public function edit_user_by_id($data){
        $sql = "UPDATE user
                SET nama = ?,
                    email = ?,
                    password = ?,
                    no_telpon = ?,
                    id_role = ?
                WHERE id_user = ?;";
        return $this->db->query($sql, $data);
    }

    public function delete_user_by_id($id_user){
        $sql = "DELETE FROM user
                WHERE id_user = ?;";
        return $this->db->query($sql, $id_user);
    }
}