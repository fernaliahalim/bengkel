<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_Kendaraan extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('tipe_kendaraan_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'tipe_kendaraan');
            
            $data = array(
                'rs_tipe_kendaraan' => $this->tipe_kendaraan_model->get_all_tipe_kendaraan()
            );

            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('list_tipe_kendaraan', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }

    public function add_tipe_kendaraan(){
        $nama_tipe = $this->input->post('nama_tipe');

        $this->tipe_kendaraan_model->add_tipe_kendaraan($nama_tipe);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function edit_tipe_kendaraan_by_id(){
        $id_tipe_kendaraan = $this->input->post('id_tipe_kendaraan');
        $nama_tipe = $this->input->post('nama_tipe');

        $data = array(
            $nama_tipe,
            $id_tipe_kendaraan
        );

        $this->tipe_kendaraan_model->edit_tipe_kendaraan_by_id($data);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function delete_tipe_kendaraan_by_id(){
        $id_tipe_kendaraan = $this->input->post('id_tipe_kendaraan');

        $this->tipe_kendaraan_model->delete_tipe_kendaraan_by_id($id_tipe_kendaraan);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }
}