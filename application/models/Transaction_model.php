<?php

class Transaction_model extends CI_Model{
    public function get_all_transaction($date){
        $sql = "SELECT transaction.*,
                       customer.*,
                       teknisi.nama_teknisi,
                       user.nama AS inputed_by
                FROM transaction
                JOIN customer ON customer.id_customer = transaction.id_customer
                JOIN teknisi ON teknisi.id_teknisi = transaction.id_teknisi
                JOIN user ON user.id_user = transaction.id_user
                WHERE DATE(transaction.date_time) = ?;";
        return $this->db->query($sql, $date);
    }

    public function get_last_id_transaction(){
        $sql = "SELECT MAX(id_transaction) AS last_id
                FROM transaction; ";
        return $this->db->query($sql);
    }

    public function add_transaction($data){
        $sql = "INSERT INTO transaction(id_transaction, id_customer, id_teknisi, id_user)
                VALUE (?, ?, ?, ?);";
        return $this->db->query($sql, $data);
    }

    public function get_transaction_by_id($id){
        $sql = "SELECT transaction.*,
                       customer.*,
                       teknisi.nama_teknisi,
                       user.nama AS inputed_by
                FROM transaction
                JOIN customer ON customer.id_customer = transaction.id_customer
                JOIN teknisi ON teknisi.id_teknisi = transaction.id_teknisi
                JOIN user ON user.id_user = transaction.id_user
                WHERE transaction.id_transaction = ?;";
        return $this->db->query($sql, $id);
    }
}