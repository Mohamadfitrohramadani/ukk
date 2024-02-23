<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Foto');
        $this->load->model('M_User');
        $this->load->model('M_Like');
        $this->load->model('M_Album');
        $this->load->model('M_Komen');

    }
    public function index()
    {
        // Periksa status login pengguna
        if (!$this->session->userdata('email')) {
            // Jika belum login, alihkan ke halaman login
            redirect('login');
        }
        $data['total_users'] = $this->M_User->count_users();
        $data['total_album'] = $this->M_Album->count_album();
        $data['total_foto'] = $this->M_Foto->count_foto();
        $data['total_komen'] = $this->M_Komen->count_komen();
        $data['total_like'] = $this->M_Like->count_like();
        $data['total_max_users'] = 100;
        $data['total_max_album'] = 100;
        $data['total_max_foto'] = 100;
        $data['total_max_komen'] = 100;
        $data['total_max_like'] = 100;
        $this->load->view('dashboard', $data);
    }


}


