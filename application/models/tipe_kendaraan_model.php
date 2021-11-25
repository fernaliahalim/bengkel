<?php

class Tipe_kendaraan_model extends CI_Model{
    public function get_all_tipe_kendaraan(){
        $sql = "SELECT * FROM tipe_kendaraan;";
        return $this->db->query($sql);
    }

    public function add_tipe_kendaraan($nama_tipe){
        $sql = "INSERT INTO tipe_kendaraan(nama_tipe)
                VALUES(?);";
        return $this->db->query($sql, $nama_tipe);
    }

    public function edit_tipe_kendaraan_by_id($data){
        $sql = "UPDATE tipe_kendaraan
                SET nama_tipe = ?
                WHERE id_tipe_kendaraan = ?;";
        return $this->db->query($sql, $data);
    }

    public function delete_tipe_kendaraan_by_id($id_tipe_kendaraan){
        $sql = "DELETE FROM tipe_kendaraan
                WHERE id_tipe_kendaraan = ?;";
        return $this->db->query($sql, $id_tipe_kendaraan);
    }
}