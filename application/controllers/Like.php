<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Like extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Periksa status login pengguna
        if (!$this->session->userdata('email')) {
            // Jika belum login, alihkan ke halaman login
            redirect('login');
        }
        $this->load->model('M_Like');
        $this->load->model('M_Foto');
        $this->load->model('M_Album');
    }
    public function index()
    {
        $like = $this->M_Like->getDatalike();
        $DATA = array('data_like' => $like);
        $this->load->view('like/viewlike', $DATA);
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        


    }

    public function tambahlike()
    {
        $this->load->view('like/tambahlike');
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
       
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

    //like di bagian halaman detail//
    public function like($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $this->M_Like->like($foto_id, $user_id);
            redirect('home/detail/' . $foto_id);
        } else {
            show_error('Invalid Foto ID');
        }
        $data['foto_id'] = $foto_id;
        $this->load->view('home/viewdetail', $data);
    }


    //unlike di bagian halaman detail//
    public function unlike($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $this->M_Like->unlike($foto_id, $user_id);
            redirect('home/detail/' . $foto_id);
        } else {
            show_error('Invalid Foto ID');
        }
    }


    //like di bagian halaman home//
    public function likeh($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $this->M_Like->likeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }
        redirect('home');
    }

    //unlike di bagian halaman home//
    public function unlikeh($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $user_id = $this->session->userdata('user_id');
            $this->M_Like->unlikeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }
        redirect('home');
    }




    //like di bagian halaman like terbanyak//
    public function liket($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $this->M_Like->likeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }
        redirect('home/liketerbanyak');
    }
    //unlike di bagian halaman like terbanyak//
    public function unliket($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $user_id = $this->session->userdata('user_id');
            $this->M_Like->unlikeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }
        redirect('home/liketerbanyak');
    }
    //like di bagian halaman komen terbanyak//
    public function likek($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $this->M_Like->likeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }
        redirect('home/komenterbanyak');
    }

    //unlike di bagian halaman komen terbanyak//
    public function unlikek($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $user_id = $this->session->userdata('user_id');
            $this->M_Like->unlikeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }
        redirect('home/komenterbanyak');
    }


    //like di bagian halaman album//
    public function likealbum($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $album_id = $this->M_Foto->get_album_id_by_foto($foto_id);
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $this->M_Like->likeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }
        redirect('home/dataalbum/' . $album_id);
    }

    //unlike di bagian halaman kategori / album//
    public function unlikealbum($foto_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $album_id = $this->M_Foto->get_album_id_by_foto($foto_id);
        if ($this->M_Foto->is_valid_foto($foto_id)) {
            $user_id = $this->session->userdata('user_id');
            $this->M_Like->unlikeh($foto_id, $user_id);
        } else {
            show_error('Invalid Foto ID');
        }

        // Redirect ke halaman home
        redirect('home/dataalbum/' . $album_id);
    }




}