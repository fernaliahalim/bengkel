<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('jenis_kendaraan_model');
        $this->load->model('tipe_kendaraan_model');
        $this->load->model('customer_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'customer');
            
            $data = array(
                'rs_jenis_kendaraan' => $this->jenis_kendaraan_model->get_all_jenis_kendaraan(),
                'rs_tipe_kendaraan' => $this->tipe_kendaraan_model->get_all_tipe_kendaraan(),
                'rs_customer' => $this->customer_model->get_all_customer()
            );

            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('list_customer', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }

    public function add_customer(){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telpon = $this->input->post('no_telpon');
        $no_stnk = $this->input->post('no_stnk');
        $id_jenis_kendaraan = $this->input->post('id_jenis_kendaraan');
        $id_tipe_kendaraan = $this->input->post('id_tipe_kendaraan');
        $note = $this->input->post('note');

        $data = array(
            $nama,
            $alamat,
            $no_telpon,
            $no_stnk,
            $id_jenis_kendaraan,
            $id_tipe_kendaraan,
            $note
        );

        $this->customer_model->add_customer($data);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function edit_customer_by_id(){
        $id_customer = $this->input->post('id_customer');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telpon = $this->input->post('no_telpon');
        $no_stnk = $this->input->post('no_stnk');
        $id_jenis_kendaraan = $this->input->post('id_jenis_kendaraan');
        $id_tipe_kendaraan = $this->input->post('id_tipe_kendaraan');
        $note = $this->input->post('note');

        $data = array(
            $nama,
            $alamat,
            $no_telpon,
            $no_stnk,
            $id_jenis_kendaraan,
            $id_tipe_kendaraan,
            $note,
            $id_customer
        );

        $this->customer_model->edit_customer_by_id($data);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function delete_customer_by_id(){
        $id_customer = $this->input->post('id_customer');

        $this->customer_model->delete_customer_by_id($id_customer);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function get_detail_customer_by_no_stnk(){
        $arg = $this->input->get('term', true);
        $data = array();
        
        $rs_customer = $this->customer_model->get_detail_customer_by_no_stnk($arg);
        foreach($rs_customer->result_array() as $row){
            $data[] = array(
                'id_customer' => $row['id_customer'],
                'nama' => $row['nama'],
                'alamat' => $row['alamat'],
                'no_telpon' => $row['no_telpon'],
                'no_stnk' => $row['no_stnk'],
                'jenis' => $row['nama_jenis'],
                'tipe' => $row['nama_tipe'],
                'note' => $row['note']
            );
        }

        $data = array_slice($data, 0, 30);
        $this->output->set_output(json_encode($data));
    }

    public function get_detail_customer_by_no_stnk_ajax(){
        $no_stnk = $this->input->get('no_stnk');
        $rs_customer = $this->customer_model->get_detail_customer_by_no_stnk($arg);
    }
}