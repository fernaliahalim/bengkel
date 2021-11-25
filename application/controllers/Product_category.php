<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Category extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('product_category_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'product_category');

            $data = array(
                'rs_product_category' => $this->product_category_model->get_all_product_category()
            );
            
            //load dashboard.php view
            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('product_categories_list', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }
    
    public function add_product_category(){
        $nama_kategori = $this->input->post('nama_kategori_input');

        $this->product_category_model->add_product_category($nama_kategori);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function edit_product_category_by_id(){
        $id_kategori = $this->input->post('id_kategori_input');
        $nama_kategori = $this->input->post('nama_kategori_input');

        $this->product_category_model->edit_product_category_by_id(array($nama_kategori, $id_kategori));
        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }

    public function delete_product_category_by_id(){
        $id_kategori = $this->input->post('id_kategori');

        $this->product_category_model->delete_product_category_by_id($id_kategori);
        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }
}