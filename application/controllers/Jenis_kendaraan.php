<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Kendaraan extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('jenis_kendaraan_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'jenis_kendaraan');
            
            $data = array(
                'rs_jenis_kendaraan' => $this->jenis_kendaraan_model->get_all_jenis_kendaraan()
            );

            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('list_jenis_kendaraan', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }

    public function add_jenis_kendaraan(){
        $nama_jenis = $this->input->post('nama_jenis');

        $this->jenis_kendaraan_model->add_jenis_kendaraan($nama_jenis);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function edit_jenis_kendaraan_by_id(){
        $id_jenis_kendaraan = $this->input->post('id_jenis_kendaraan');
        $nama_jenis = $this->input->post('nama_jenis');

        $data = array(
            $nama_jenis,
            $id_jenis_kendaraan
        );

        $this->jenis_kendaraan_model->edit_jenis_kendaraan_by_id($data);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function delete_jenis_kendaraan_by_id(){
        $id_jenis_kendaraan = $this->input->post('id_jenis_kendaraan');

        $this->jenis_kendaraan_model->delete_jenis_kendaraan_by_id($id_jenis_kendaraan);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }
}