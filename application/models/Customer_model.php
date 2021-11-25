<?php

class customer_model extends CI_Model{
    public function get_all_customer(){
        $sql = "SELECT customer.*,
                       jenis_kendaraan.nama_jenis,
                       tipe_kendaraan.nama_tipe
                FROM customer
                JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = customer.id_jenis_kendaraan
                JOIN tipe_kendaraan ON tipe_kendaraan.id_tipe_kendaraan = customer.id_tipe_kendaraan;";
        return $this->db->query($sql);
    }

    public function add_customer($data){
        $sql = "INSERT INTO customer(nama, alamat, no_telpon, no_stnk, id_jenis_kendaraan, id_tipe_kendaraan, note)
                VALUES(?, ?, ?, ?, ?, ?, ?);";
        return $this->db->query($sql, $data);
    }

    public function edit_customer_by_id($data){
        $sql = "UPDATE customer
                SET nama = ?,
                    alamat = ?,
                    no_telpon = ?,
                    no_stnk = ?,
                    id_jenis_kendaraan = ?,
                    id_tipe_kendaraan = ?,
                    note = ?
                WHERE id_customer = ?;";
        return $this->db->query($sql, $data);
    }

    public function delete_customer_by_id($id_customer){
        $sql = "DELETE FROM customer
                WHERE id_customer = ?;";
        return $this->db->query($sql, $id_customer);
    }

    public function get_detail_customer_by_no_stnk($arg){
        $sql = "SELECT customer.*,
                       jenis_kendaraan.nama_jenis,
                       tipe_kendaraan.nama_tipe
                FROM customer
                JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = customer.id_jenis_kendaraan
                JOIN tipe_kendaraan ON tipe_kendaraan.id_tipe_kendaraan = customer.id_tipe_kendaraan
                WHERE customer.no_stnk LIKE '{$arg}%';";
        return $this->db->query($sql);
    }
}