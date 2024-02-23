

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('M_User');
    }

    public function index()
    {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        // Jika validasi form berhasil
        if ($this->form_validation->run() == true) {
            // Lanjutkan dengan proses login
            $this->_login();
        } else {
            // Validasi form gagal, tampilkan kembali halaman login
            $this->load->view('login/loginuser');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->M_User->get_user_by_email($email);
        
    
        if ($user) {
            // Memeriksa apakah password cocok
            if ($password === $user->password) {
                $data = [
                    'email' => $user->email,
                    'role_id' => $user->role_id,
                    'username' => $user->username,
                    'namalengkap' => $user->namalengkap,
                    'alamat' => $user->alamat,
                    'foto_user' => $user->foto_user,
                    'user_id' => $user->user_id // Tambahkan kolom 'id'
                ];
                $this->session->set_userdata($data);
    
                if ($user->role_id == 1) {
                    redirect(base_url('dashboard')); // Redirect ke /admin jika role_id adalah 1 (admin)
                } elseif ($user->role_id == 2) {
                    redirect(base_url('home')); // Redirect ke /home jika role_id adalah 2 (user)
                }
            } else {
                // Password tidak cocok, tampilkan pesan kesalahan
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect(base_url('login'));
            }
        } else {
            // Email tidak terdaftar, tampilkan pesan kesalahan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar</div>');
            redirect(base_url('login'));
        }
    }
    

    public function logout()
    {
        // Periksa role_id sebelum melakukan pengalihan
        $role_id = $this->session->userdata('role_id');

        // Hapus data sesi
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        // Set pesan sesuai dengan role_id
        if ($role_id == 1 || $role_id == 2) {
            $message = '<div class="alert alert-success" role="alert">Anda berhasil logout</div>';
            $redirect_url = base_url('home');
        } else {
            // Handle kasus lain jika diperlukan
            $message = '<div class="alert alert-success" role="alert">Anda berhasil logout</div>';
            $redirect_url = base_url('home'); // Atur pengalihan default
        }

        // Set pesan flashdata dan redirect
        $this->session->set_flashdata('message', $message);
        redirect($redirect_url);
    }
}

