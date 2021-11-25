<?php

class Product_Model extends CI_Model{
    public function get_all_product(){
        $sql = "SELECT product.*,  
                       product_category.category_name
                FROM product
                JOIN product_category 
                ON product_category.id_category = product.id_category;";
        return $this->db->query($sql);
    }

    public function add_product($data){
        $sql = "INSERT INTO product(id_category, nama_barang, stock, harga_jual)
                VALUES(?,?,?, ?);";
        return $this->db->query($sql, $data);
    }

    public function edit_product_by_id($data){
        $sql = "UPDATE product
                SET id_category = ?,
                    nama_barang = ?,
                    stock = ?,
                    harga_jual = ?
                WHERE id_barang = ?;";
        return $this->db->query($sql, $data);
    }

    public function delete_product_by_id($id_barang){
        $sql = "DELETE FROM product
                WHERE id_barang = ?;";
        return $this->db->query($sql, $id_barang);
    }

    public function update_product_stock_by_id($stock, $id_barang){
        $sql = "UPDATE product
                SET stock = ?
                WHERE id_barang = ?;";
        return $this->db->query($sql, array($stock, $id_barang));
    }

    public function cek_stock_barang_by_id($id_barang){
        $sql = "SELECT stock
                FROM product
                WHERE id_barang = ?;";

        $rs = $this->db->query($sql, $id_barang);
        $row = $rs->row_array();
        return $row['stock'];
    }
}