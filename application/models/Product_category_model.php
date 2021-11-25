<?php

class Product_category_model extends CI_Model{
    public function get_all_product_category(){
        $sql = "SELECT * FROM product_category;";
        return $this->db->query($sql);
    }

    public function add_product_category($category_name){
        $sql = "INSERT INTO product_category(category_name) 
                VALUES(?);";
        return $this->db->query($sql, $category_name);
    }

    public function edit_product_category_by_id($data){
        $sql = "UPDATE product_category
                SET category_name = ?
                WHERE id_category = ?;";
        return $this->db->query($sql, $data);
    }

    public function delete_product_category_by_id($id_category){
        $sql = "DELETE FROM product_category
                WHERE id_category = ?;";
        return $this->db->query($sql, $id_category);
    }
}