<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('M_User');
    }

    public function index()
    {
        
            // Validasi form gagal, tampilkan kembali halaman login
            $this->load->view('login/register');
        

    }
    public function Inputuser()
    {
        $user_id = $this->input->post('user_id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $namalengkap = $this->input->post('namalengkap');
        $alamat = $this->input->post('alamat');
        // $role_id = $this->input->post('role_id');

        $DataInsert = array(
            'user_id' => $user_id,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'namalengkap' => $namalengkap,
            'alamat' => $alamat,
            'role_id' => 2
        );

        if ($this->M_User->InsertDatauser($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data user berhasil ditambahkan.');
            redirect(base_url('login/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data user.');
            redirect(base_url('register/'));
        }
    }
}