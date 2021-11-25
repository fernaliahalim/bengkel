<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();

        //introduce the Auth_model to the class
        $this->load->model('auth_model');
        $this->load->model('user_model');
        $this->load->model('role_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            //set active menu
            $this->session->set_userdata('mainsetting_active_menu', 'user');

            //get detail user by iduser
            $rs_user = $this->auth_model->get_user_by_iduser($this->session->userdata('maindata_iduser'));
            $row_user = $rs_user->row_array();
            $data = array(
                'id_user' => $this->session->userdata('maindata_iduser'),
                'nama' => $row_user['nama'],
                'email' => $row_user['email'],
                'password' => $row_user['password'],
                'no_telpon' => $row_user['no_telpon']
            );

            //load dashboard.php view
            $this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('account_setting', $data);
            $this->load->view('footer');
        } else{
            redirect('home');
        }
    }

    public function update_user_by_iduser(){
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');

        $data = array(
            $nama,
            $password,
            $no_telpon,
            $id_user
        );

        $rs = $this->auth_model->update_user_by_iduser($data);
        $this->session->set_flashdata('success', 'Perubahan data berhasil dilakukan'); 

        redirect('user');
    }

    public function list_user(){
        //set active menu
        $this->session->set_userdata('mainsetting_active_menu', 'list_user');

        $data = array(
            'rs_role' => $this->role_model->get_all_role(),
            'rs_user' => $this->user_model->get_all_user()
        );

        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('list_user', $data);
        $this->load->view('footer');
    }

    public function add_user(){
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');
        $id_role = $this->input->post('id_role');

        $data = array(
            $nama,
            $email,
            $password,
            $no_telpon,
            $id_role
        );

        $this->user_model->add_user($data);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function edit_user_by_id(){
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $no_telpon = $this->input->post('no_telpon');
        $id_role = $this->input->post('id_role');

        $data = array(
            $nama,
            $email,
            $password,
            $no_telpon,
            $id_role,
            $id_user
        );

        $this->user_model->edit_user_by_id($data);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }

    public function delete_user_by_id(){
        $id_user = $this->input->post('id_user');

        $this->user_model->delete_user_by_id($id_user);
        $this->session->set_flashdata('success', 'Penambahan data berhasil dilakukan');
    }
}