<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

          // Periksa status login pengguna
    if (!$this->session->userdata('email')) {
        // Jika belum login, alihkan ke halaman login
        redirect('login');
    }
        $this->load->model('M_User');
    }
    public function index()
    {
     
        $user = $this->M_User->getDatauser();
        $DATA = array('data_user' => $user);
        $this->load->view('user/viewuser',$DATA);
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
       
    }

    public function tambahuser()
    {
        $this->load->view('user/tambahuser');
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
    }
    public function Inputuser()
    {
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('M_User');
    
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('role_id', 'Role Id', 'required');
    
        if ($this->form_validation->run() == TRUE) {
          $config['upload_path'] = './assets/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('foto_user')) {
                $upload_data = $this->upload->data();
    
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'email' => $this->input->post('email'),
                    'foto_user' => $upload_data['file_name'],
                    'alamat' => $this->input->post('alamat'),
                    'namalengkap' => $this->input->post('namalengkap'),
                    'role_id' => $this->input->post('role_id'),
                );
    
                if ($this->M_User->InsertDatauser($data)) {
                    $this->session->set_flashdata('success', 'Data user berhasil ditambahkan.');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data user.');
                    redirect('user');
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('user');
            }
        } else {
            $data = array(
                'title' => 'Add User',
                'isi' => 'user/tambahuser',
            );
            $this->load->view('user/tambahuser', $data);
            $this->load->view('layout/header');
            $this->load->view('layout/footer');
          
        }
    }
    public function update($user_id)
    {
        $this->load->library('upload');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';

            $this->upload->initialize($config);

            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'namalengkap' => $this->input->post('namalengkap'),
            );
            if ($this->upload->do_upload('foto_user')) {
                $upload_data = $this->upload->data();
                $data['foto_user'] = $upload_data['file_name'];
                $existing_data = $this->M_User->get_user_by_id($user_id); 
                if (!empty($existing_data->lokasi_file)) {
                    $old_file_path = './assets/' . $existing_data->lokasi_file;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            }

            $this->M_User->UpdateDatauser($user_id, $data); 
            $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
            redirect('user');
        } else {
            $data_user = $this->M_User->get_user_by_id($user_id); 
            $data = array(
                'title' => 'Edit User',
                'data_user' => $data_user,
                'isi' => 'user/edituser',
            );

            $this->load->view('layout/header');
            $this->load->view('user/edituser', $data, FALSE);
            $this->load->view('layout/footer');

        }
    }
    
    public function delete($user_id)
    {
        $this->M_User->DeleteDatauser($user_id);
        redirect(base_url('user/'));
    }
    

}