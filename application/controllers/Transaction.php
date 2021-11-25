<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->helper('currency_helper');

        $this->load->model('teknisi_model');
        $this->load->model('transaction_model');
        $this->load->model('detail_transaction_model');
        $this->load->model('product_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'transaction');
            
            $data = array(
                'rs_teknisi' => $this->teknisi_model->get_all_teknisi()
            );

            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('transaction', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }

    public function add_transaction(){
        $id_customer = $this->input->post('id_customer');
        $id_teknisi = $this->input->post('id_teknisi');
        $id_user = $this->session->userdata('maindata_iduser');

        //get last id from transaction table
        $rs_lastid = $this->transaction_model->get_last_id_transaction();
        $row_lastid = $rs_lastid->row_array();
        $last_id = $row_lastid['last_id'] == "" ? '1' : $row_lastid['last_id']+1;

        $data = array(
            $last_id,
            $id_customer,
            $id_teknisi,
            $id_user
        );

        $this->transaction_model->add_transaction($data);
        redirect('transaction/detail_transaction?q=' . $last_id);
    }

    public function detail_transaction(){
        $id_transaction = $this->input->get('q');
        $rs_detail_transaction = $this->transaction_model->get_transaction_by_id($id_transaction);
        $row_detail_transaction = $rs_detail_transaction->row_array();

        $data = array(
            'id_transaction' => $row_detail_transaction['id_transaction'],
            'date_time' => $row_detail_transaction['date_time'],
            'nama_customer' => $row_detail_transaction['nama'],
            'alamat' => $row_detail_transaction['alamat'],
            'no_telpon' => $row_detail_transaction['no_telpon'],
            'no_stnk' => $row_detail_transaction['no_stnk'],
            'note' => $row_detail_transaction['note'],
            'id_teknisi' => $row_detail_transaction['id_teknisi'],
            'nama_teknisi' => $row_detail_transaction['nama_teknisi'],
            'inputed_by' => $row_detail_transaction['inputed_by'],
            'rs_barang' => $this->product_model->get_all_product(),
            'rs_detail_transaction' => $this->detail_transaction_model->get_detail_transaction_by_id_transaction($id_transaction)
        );

        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('detail_transaction', $data);
        $this->load->view('footer');
    }

    public function add_detail_transaction(){
        $id_transaction = $this->input->post('id_transaction');
        $id_barang = $this->input->post('id_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $total_bayar = $this->input->post('total_bayar');

        $data = array(
            $id_transaction,
            $id_barang,
            $jumlah_barang,
            $total_bayar
        );

        $this->detail_transaction_model->add_detail_transaction($data);

        $stock = $this->product_model->cek_stock_barang_by_id($id_barang);
        $new_stock = $stock - $jumlah_barang;
        $this->product_model->update_product_stock_by_id($new_stock, $id_barang);

        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }

    public function delete_detail_transaction_by_id(){
        $id_detail_transaction = $this->input->post('id_detail_transaction');
        $id_barang = $this->input->post('id_barang_detail_transaction');
        $jumlah_barang = $this->input->post('jumlah_detail_transaction');

        $this->detail_transaction_model->delete_detail_transaction_by_id($id_detail_transaction);

        $stock = $this->product_model->cek_stock_barang_by_id($id_barang);
        $new_stock = $stock + $jumlah_barang;
        $this->product_model->update_product_stock_by_id($new_stock, $id_barang);

        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan');
    }

    public function show_list(){
        $this->session->set_userdata('mainsetting_active_menu', 'transaction');

        $tanggal = date('Y-m-d');
            
        $data = array(
            'tanggal' => $tanggal,
            'rs_transaction' => $this->transaction_model->get_all_transaction($tanggal)
        );

        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('list_transaction', $data);
        $this->load->view('footer');
    }

    public function print(){
        $id_transaction = $this->input->get('q');
        $rs_detail_transaction = $this->transaction_model->get_transaction_by_id($id_transaction);
        $row_detail_transaction = $rs_detail_transaction->row_array();

        $data = array(
            'id_transaction' => $row_detail_transaction['id_transaction'],
            'date_time' => $row_detail_transaction['date_time'],
            'nama_customer' => $row_detail_transaction['nama'],
            'alamat' => $row_detail_transaction['alamat'],
            'no_telpon' => $row_detail_transaction['no_telpon'],
            'no_stnk' => $row_detail_transaction['no_stnk'],
            'note' => $row_detail_transaction['note'],
            'id_teknisi' => $row_detail_transaction['id_teknisi'],
            'nama_teknisi' => $row_detail_transaction['nama_teknisi'],
            'inputed_by' => $row_detail_transaction['inputed_by'],
            'rs_detail_transaction' => $this->detail_transaction_model->get_detail_transaction_by_id_transaction($id_transaction)
        );

        $this->load->view('header');
        $this->load->view('print_transaction', $data);
    }
}