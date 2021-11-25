<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan_Barang extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->helper('currency_helper');

        $this->load->model('pengadaan_barang_model');
        $this->load->model('product_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'pengadaan_barang');
            
            $data = array(
                'rs_pengadaan_barang' => $this->pengadaan_barang_model->get_all_pengadaan_barang(),
                'rs_product' => $this->product_model->get_all_product()
            );

            //load dashboard.php view
            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('list_pengadaan_barang', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }

    public function add_pengadaan_barang(){
        $no_faktur = $this->input->post('no_faktur');
        $tgl_faktur = date("Y-m-d", strtotime($this->input->post('tgl_faktur')));
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');
        $harga_beli = $this->input->post('harga_beli');
        $id_user = $this->session->userdata('maindata_iduser');

        $data = array(
            $no_faktur,
            $tgl_faktur,
            $id_barang,
            $jumlah,
            $harga_beli,
            $id_user
        );

        $this->pengadaan_barang_model->add_pengadaan_barang($data);

        $stock = $this->product_model->cek_stock_barang_by_id($id_barang);
        $new_stock = $stock + $jumlah;
        $this->product_model->update_product_stock_by_id($new_stock, $id_barang);

        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }

    public function edit_pengadaan_by_id(){
        $id_pengadaan = $this->input->post('id_pengadaan');
        $no_faktur = $this->input->post('no_faktur');
        $tgl_faktur = date("Y-m-d", strtotime($this->input->post('tgl_faktur')));
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');
        $harga_beli = $this->input->post('harga_beli');
        $id_user = $this->session->userdata('maindata_iduser');

        $data = array(
            $no_faktur,
            $tgl_faktur,
            $id_barang,
            $jumlah,
            $harga_beli,
            $id_user,
            $id_pengadaan
        );

        $this->pengadaan_barang_model->edit_pengadaan_by_id($data);
        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }

    public function delete_pengadaan_by_id(){
        $id_pengadaan = $this->input->post('id_pengadaan');
        $jumlah = $this->input->post('jumlah');

        $this->pengadaan_barang_model->delete_pengadaan_by_id($id_pengadaan);

        $stock = $this->product_model->cek_stock_barang_by_id($id_barang);
        $new_stock = $stock - $jumlah;
        $this->product_model->update_product_stock_by_id($new_stock, $id_barang);

        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }
}