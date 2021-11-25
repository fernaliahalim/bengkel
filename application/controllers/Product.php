<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->helper('currency_helper');

        $this->load->model('product_category_model');
        $this->load->model('product_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'product');
            
            $data = array(
                'rs_product_category' => $this->product_category_model->get_all_product_category(),
                'rs_product' => $this->product_model->get_all_product()
            );

            //load dashboard.php view
            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('products_list', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }

    public function add_product(){
        $id_category = $this->input->post('id_category');
        $nama_barang = $this->input->post('nama_barang');
        $stock = $this->input->post('stock');
        $harga_jual = $this->input->post('harga_jual');

        $this->product_model->add_product(array($id_category, $nama_barang, $stock, $harga_jual));
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function edit_product_by_id(){
        $id_barang = $this->input->post('id_barang');
        $id_category = $this->input->post('id_category');
        $nama_barang = $this->input->post('nama_barang');
        $stock = $this->input->post('stock');
        $harga_jual = $this->input->post('harga_jual');

        $this->product_model->edit_product_by_id(array($id_category, $nama_barang, $stock, $harga_jual, $id_barang));
        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }

    public function delete_product_by_id(){
        $id_barang = $this->input->post('id_barang');

        $this->product_model->delete_product_by_id($id_barang);
        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }

    public function cek_stock_barang_by_idbarang(){
        $id_barang = $this->input->post('id_barang');

        echo $stock = $this->product_model->cek_stock_barang_by_id($id_barang);
    }
}