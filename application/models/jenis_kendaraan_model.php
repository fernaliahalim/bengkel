<?php

class Jenis_kendaraan_model extends CI_Model{
    public function get_all_jenis_kendaraan(){
        $sql = "SELECT * FROM jenis_kendaraan;";
        return $this->db->query($sql);
    }

    public function add_jenis_kendaraan($nama_jenis){
        $sql = "INSERT INTO jenis_kendaraan(nama_jenis)
                VALUES(?);";
        return $this->db->query($sql, $nama_jenis);
    }

    public function edit_jenis_kendaraan_by_id($data){
        $sql = "UPDATE jenis_kendaraan
                SET nama_jenis = ?
                WHERE id_jenis_kendaraan = ?;";
        return $this->db->query($sql, $data);
    }

    public function delete_jenis_kendaraan_by_id($id_jenis_kendaraan){
        $sql = "DELETE FROM jenis_kendaraan
                WHERE id_jenis_kendaraan = ?;";
        return $this->db->query($sql, $id_jenis_kendaraan);
    }
}