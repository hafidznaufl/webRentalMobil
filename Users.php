<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
    public function registrasi()
    {
        $this->load->view('index.php/registrasi');
        $this->load->model('users_model','user');

        $_username = $this->input->post('username');
        $_email = $this->input->post('email');
        $_role = $this->input->post('role');
        $_password = $this->input->post('password');
        $_status = $this->input->post('status');

        $data_user[] = $_username;
        $data_user[] = $_password;
        $data_user[] = $_email;
        $data_user[] = $_status;
        $data_user[] = $_role;

        $this->user->register($data_user);

        redirect(base_url().'index.php/login');
    }

    public function autentikasi()
    {
        $this->load->model('users_model','user');
        $_username = $this->input->post('username');
        $_password = $this->input->post('password');

        $row = $this->user->login($_username,$_password);
        if (isset($row)) {
            $this->session->set_userdata('username',$row->username);
            $this->session->set_userdata('id',$row->id);
            redirect(base_url().'index.php/dashboard');
        }else {
            redirect(base_url().'index.php/login?status=f');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'index.php/dashboard');
    }
}