<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Foto');
        $this->load->model('M_User');
        $this->load->model('M_Like');

    }

    // Controller Home
    public function index()
    {
        $data['data_user'] = $this->M_User->getDatauser();
        $data['data_foto'] = $this->M_Foto->getDatafoto();

        // Tambahkan informasi yang diperlukan untuk tombol like
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            $this->load->model('M_Like');

            foreach ($data['data_foto'] as $foto) {
                $foto_id = $foto->foto_id;
                $data['isLiked'][$foto_id] = $this->M_Like->isLiked($foto_id, $user_id);
                $data['likeCounts'][$foto_id] = $this->M_Like->getLikeCount($foto_id);
            }

            // Inisialisasi variabel $user_id
            $data['user_id'] = $user_id;
        }

        $this->load->view('home/viewhome', $data);
    }



    public function album()
    {
        $this->load->view('home/viewalbum');
    }

    public function profil()
    {
        $user_id = $this->session->userdata('user_id');

        // Load model M_album dan M_foto
        $this->load->model('M_foto');
        $this->load->model('M_Like'); // Load model M_Like

        // Panggil fungsi getFotoByIdUser dari model M_foto
        $data['fotos'] = $this->M_foto->getFotoByIdUser($user_id);

        // Misalnya, ambil data user dari model atau sesuai kebutuhan
        $data['user_foto'] = $this->M_Foto->getDatafoto(); // Ganti M_User dengan model yang sesuai
        $data['like_model'] = $this->M_Like;

        $this->load->view('home/viewprofil', $data);
    }

    public function editprofil()
    {
        $this->load->view('home/viewedit');
    }
    public function detail($foto_id)
    {
        $this->load->model('M_Foto');
        $this->load->model('M_Komen');
        $this->load->model('M_Like');

        $detail_data = $this->M_Foto->getDataFotoDetail($foto_id);
        $data['comments'] = $this->M_Komen->getCommentsWithUserInfo($foto_id);
        $data['user_id'] = $this->session->userdata('user_id');

        // Pastikan data foto_id dan detail_data disertakan dalam array data
        $data['foto_id'] = $foto_id;
        $data['detail_data'] = $detail_data;

        // Load view dengan menyertakan data
        $this->load->view('home/viewdetail', $data);
    }

    public function submitComment()
    {
        $foto_id = $this->input->post('foto_id');
        $user_id = $this->input->post('user_id');
        $isi_komen = $this->input->post('isi_komen');

        $data = array(
            'foto_id' => $foto_id,
            'user_id' => $user_id,
            'isi_komen' => $isi_komen,
            'tgl_komen' => date('Y-m-d H:i:s') // Tanggal dan waktu saat ini
        );

        $this->M_Komen->insertComment($data);
        redirect('home/detail/' . $foto_id);
    }
    public function editProfile()
    {
        // Mendapatkan ID pengguna dari sesi
        $user_id = $this->session->userdata('user_id');

        // Mengambil data pengguna berdasarkan ID
        $data['user_data'] = $this->M_User->getUserById($user_id);

        // Memuat tampilan editprofil dan menyertakan data pengguna
        $this->load->view('home/editprofil', $data);
    }



}