<?php

class Detail_transaction_model extends CI_Model{
    public function get_detail_transaction_by_id_transaction($id_transaction){
        $sql = "SELECT detail_transaction.*,
                       product.nama_barang
                FROM detail_transaction
                JOIN product ON product.id_barang = detail_transaction.id_barang
                WHERE detail_transaction.id_transaction = ?;";
        return $this->db->query($sql, $id_transaction);
    }

    public function add_detail_transaction($data){
        $sql = "INSERT INTO detail_transaction(id_transaction, id_barang, jumlah_barang, total_bayar)
                VALUES(?, ?, ?, ?);";
        return $this->db->query($sql, $data);
    }

    public function delete_detail_transaction_by_id($id_detail_transaction){
        $sql = "DELETE FROM detail_transaction
                WHERE id_detail_transaction = ?;";
        return $this->db->query($sql, $id_detail_transaction);
    }
}