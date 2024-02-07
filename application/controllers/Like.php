<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Like extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if (!$this->session->likedata('email')) {
        //     redirect('login');
        // }

        // $role_id = $this->session->likedata('role_id');

        // if ($role_id == 2) {

        //     redirect('home');
        // }
        $this->load->model('M_Like');
        $this->load->model('M_Foto');
    }
    public function index()
    {
        $like = $this->M_Like->getDatalike();
        $DATA = array('data_like' => $like);
        $this->load->view('like/viewlike', $DATA);
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');


    }

    public function tambahlike()
    {
        $this->load->view('like/tambahlike');
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');
    }
    public function Inputlike()
    {
        $like_id = $this->input->post('like_id');
        $foto_id = $this->input->post('foto_id');
        $user_id = $this->input->post('user_id');
        $tanggal_like = $this->input->post('tanggal_like');

        $DataInsert = array(
            'like_id' => $like_id,
            'foto_id' => $foto_id,
            'user_id' => $user_id,
            'tanggal_like' => $tanggal_like,
        );

        if ($this->M_Like->InsertDatalike($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data like berhasil ditambahkan.');
            redirect(base_url('like/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data like.');
            redirect(base_url('like/'));
        }
    }
    public function update($like_id)
    {
        $like = $this->M_User->getDatalikeDetail($like_id);
        $DATA = array('data_like' => $like);
        $this->load->view('like/editlike', $DATA);
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');
    }
    public function updatelike()
    {
        $like_id = $this->input->post('like_id');
        $foto_id = $this->input->post('foto_id');
        $user_id = $this->input->post('user_id');
        $tanggal_like = $this->input->post('tanggal_like');



        $DataUpdate = array(
            'like_id' => $like_id,
            'foto_id' => $foto_id,
            'user_id' => $user_id,
            'tanggal_like' => $tanggal_like,
        );

        $this->M_Like->UpdateDatalike($DataUpdate, $like_id);
        redirect(base_url('like/'));
    }
    public function delete($like_id)
    {
        $this->M_Like->DeleteDatalike($like_id);
        redirect(base_url('like/'));
    }
    public function like($foto_id)
    {
        // Periksa apakah user sudah login
        if (!$this->session->userdata('user_id')) {
            // Redirect atau tampilkan pesan kesalahan jika user belum login
            redirect('login');
        }

        // Ambil user_id dari session
        $user_id = $this->session->userdata('user_id');

        // Cek apakah foto_id valid
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            // Lakukan proses like
            $this->M_Like->like($foto_id, $user_id);
            redirect('home/detail/' . $foto_id); // Ganti dengan URL halaman detail foto
        } else {
            // Tampilkan pesan kesalahan jika foto_id tidak valid
            show_error('Invalid Foto ID');
        }
        $data['foto_id'] = $foto_id; // Replace $foto_id with the actual value you want to pass
        $this->load->view('home/viewdetail', $data);
    }
    public function likeh($foto_id)
{
    // Periksa apakah user sudah login
    if (!$this->session->userdata('user_id')) {
        // Redirect atau tampilkan pesan kesalahan jika user belum login
        redirect('login');
    }

    // Ambil user_id dari session
    $user_id = $this->session->userdata('user_id');

    // Cek apakah foto_id valid
    if ($this->M_Foto->is_valid_foto($foto_id)) {
        // Lakukan proses like
        $this->M_Like->likeh($foto_id, $user_id);
    } else {
        // Tampilkan pesan kesalahan jika foto_id tidak valid
        show_error('Invalid Foto ID');
    }

    // Redirect dengan URL halaman detail foto
    redirect('home');
}

    public function unlike($foto_id)
    {
        // Periksa apakah user sudah login
        if (!$this->session->userdata('user_id')) {
            // Redirect atau tampilkan pesan kesalahan jika user belum login
            redirect('login');
        }

        // Ambil user_id dari session
        $user_id = $this->session->userdata('user_id');

        // Cek apakah foto_id valid
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            // Lakukan proses unlike
            $this->M_Like->unlike($foto_id, $user_id);
            redirect('home/detail/' . $foto_id); // Ganti dengan URL halaman detail foto
        } else {
            // Tampilkan pesan kesalahan jika foto_id tidak valid
            show_error('Invalid Foto ID');
        }
    }
    public function unlikeh($foto_id)
    {
        // Periksa apakah user sudah login
        if (!$this->session->userdata('user_id')) {
            // Redirect atau tampilkan pesan kesalahan jika user belum login
            redirect('login');
        }
    
        // Cek apakah foto_id valid
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            // Lakukan proses unlike
            $user_id = $this->session->userdata('user_id');
            $this->M_Like->unlikeh($foto_id, $user_id);
        } else {
            // Tampilkan pesan kesalahan jika foto_id tidak valid
            show_error('Invalid Foto ID');
        }
    
        // Redirect ke halaman home
        redirect('home');
    }
    



}