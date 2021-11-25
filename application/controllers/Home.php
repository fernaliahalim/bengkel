<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();

        //load auth_model.php model
        $this->load->model('auth_model');
    }

    public function index(){
        if($this->session->userdata('maindata_iduser') != ""){
            redirect('dashboard');
        } else{
            //define one time session untuk alert
            $data['email'] = $this->session->flashdata('email');
            $data['error_email'] = $this->session->flashdata('error_email');
            $data['error_password'] = $this->session->flashdata('error_password');

            //load homepage.php view
            $this->load->view('header');
            $this->load->view('homepage', $data);
            $this->load->view('footer');
        }
    }

    public function auth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $rs_login = $this->auth_model->login($email, $password);

        if($rs_login->num_rows()){
            //extract data query ke array
            $row_user = $rs_login->row_array();
            $id_user = $row_user['id_user'];
            $nama = $row_user['nama'];
            $role_id = $row_user['id_role'];

            //define session
            $this->session->set_userdata('maindata_iduser', $id_user);
            $this->session->set_userdata('maindata_nama', $nama);
            $this->session->set_userdata('maindata_email', $email);
            $this->session->set_userdata('maindata_role', $role_id);

            //load ke function index di Dashboard.php Controller
            redirect('dashboard');
        } else{
            $rs_check_email = $this->auth_model->check_email($email);

            //pengecekan apakah email ada atau tidak
            if($rs_check_email->num_rows()){
                $this->session->set_flashdata('error_password', 'Password yg dimasukkan salah');
            }else{
                $this->session->set_flashdata('error_email', 'Email yg dimasukkan tidak terdaftar');
            }

            $this->session->set_flashdata('email', $email);

            //load ke function index di Home.php Controller
            redirect(site_url('home'), 'refresh');
        }
    }

    public function sign_out(){
        $this->session->sess_destroy();

        redirect('home');
    }
}