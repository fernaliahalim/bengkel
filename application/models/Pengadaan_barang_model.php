<?php

class Pengadaan_barang_model extends CI_Model{
    public function get_all_pengadaan_barang(){
        $sql = "SELECT pengadaan_barang.*, 
                       product.*,
                       user.nama
                FROM pengadaan_barang
                JOIN product ON product.id_barang = pengadaan_barang.id_barang
                JOIN user ON user.id_user = pengadaan_barang.id_user;";
        return $this->db->query($sql);
    }

    public function add_pengadaan_barang($data){
        $sql = "INSERT INTO pengadaan_barang(no_faktur, tgl_faktur, id_barang, jumlah, harga_beli, id_user)
                VALUES(?, ?, ?, ?, ?, ?);";
        return $this->db->query($sql, $data);
    }

    public function edit_pengadaan_by_id($data){
        $sql = "UPDATE pengadaan_barang
                SET no_faktur = ?,
                    tgl_faktur = ?,
                    id_barang = ?,
                    jumlah = ?,
                    harga_beli = ?,
                    tgl_edit = NOW(),
                    edited_by = ?
                WHERE id_pengadaan = ?;";
        return $this->db->query($sql, $data);
    }

    public function delete_pengadaan_by_id($id_pengadaan){
        $sql = "DELETE FROM pengadaan_barang
                WHERE id_pengadaan = ?;";
        return $this->db->query($sql, $id_pengadaan);
    }
}