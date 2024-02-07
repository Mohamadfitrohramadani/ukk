

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Komen');
    }

    public function index($foto_id)
    {
        $comments = $this->M_Komen->getCommentsByFotoId($foto_id);
        $data['comments'] = $comments;
        $this->load->view('komentar/view_komentar', $data);
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
    
        // Setelah menyimpan komentar, redirect kembali ke halaman detail
        redirect('home/detail/' . $foto_id);
    }
    
}
