<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if (!$this->session->userdata('email')) {
        //     redirect('login');
        // }

        // $role_id = $this->session->userdata('role_id');

        // if ($role_id == 2) {

        //     redirect('home');
        // }
        $this->load->model('M_User');
    }
    public function index()
    {
        $user = $this->M_User->getDatauser();
        $DATA = array('data_user' => $user);
        $this->load->view('user/viewuser',$DATA);
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');
       
    }

    public function tambahuser()
    {
        $this->load->view('user/tambahuser');
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');
    }
    // public function Inputuser()
    // {
    //     $user_id = $this->input->post('user_id');
    //     $username = $this->input->post('username');
    //     $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
    //     $email = $this->input->post('email');
    //     $namalengkap = $this->input->post('namalengkap');
    //     $alamat = $this->input->post('alamat');
    //     $role_id = $this->input->post('role_id');

    //     $DataInsert = array(
    //         'user_id' => $user_id,
    //         'username' => $username,
    //         'password' => $password,
    //         'email' => $email,
    //         'namalengkap' => $namalengkap,
    //         'alamat' => $alamat,
    //         'role_id' => 2
    //     );

    //     if ($this->M_User->InsertDatauser($DataInsert)) {
    //         $this->session->set_flashdata('success', 'Data user berhasil ditambahkan.');
    //         redirect(base_url('user/'));
    //     } else {
    //         $this->session->set_flashdata('error', 'Gagal menambahkan data user.');
    //         redirect(base_url('user/'));
    //     }
    // }
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
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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
            $this->load->view('layout/navbar');
        }
    }
    
    // public function update($user_id)
    // {
    //     $user = $this->M_User->getDatauserDetail($user_id);
    //     $DATA = array('data_user' => $user);
    //     $this->load->view('user/edituser', $DATA);
    //     $this->load->view('layout/header');
    //     $this->load->view('layout/footer');
    //     $this->load->view('layout/navbar');
    // }
    // public function updateuser()
    // {
    //     $user_id = $this->input->post('user_id');
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $email = $this->input->post('email');
    //     $namalengkap = $this->input->post('namalengkap');
    //     $alamat = $this->input->post('alamat');


    //     $DataUpdate = array(
    //         'user_id' => $user_id,
    //         'username' => $username,
    //         'password' => $password,
    //         'email' => $email,
    //         'namalengkap' => $namalengkap,
    //         'alamat' => $alamat,
    //     );

    //     $this->M_User->UpdateDatauser($DataUpdate, $user_id);
    //     redirect(base_url('user/'));
    // }
    public function update($user_id)
    {
        $this->load->library('upload');
        $this->load->library('form_validation');

        // Set form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        // Check if form validation passed
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';

            // Initialize upload library with the configuration
            $this->upload->initialize($config);

            // Database data
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'namalengkap' => $this->input->post('namalengkap'),
            );

            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('foto_user')) {
                $upload_data = $this->upload->data();
                $data['foto_user'] = $upload_data['file_name'];

                // Fetch existing data for the photo with $foto_id from the database
                $existing_data = $this->M_User->get_user_by_id($user_id); // Assuming you have a method in your model to get photo data by ID

                // Delete the old file
                
                if (!empty($existing_data->lokasi_file)) {
                    $old_file_path = './assets/' . $existing_data->lokasi_file;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            }

            // Save data to the database
            $this->M_User->UpdateDatauser($user_id, $data); // Assuming you have an "edit" method in your model

            // Redirect with success message
            $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
            redirect('user');
        } else {
            // Form validation failed or initial load
            // Fetch existing data for the photo with $user_id from the database
            $data_user = $this->M_User->get_user_by_id($user_id); // Assuming you have a method in your model to get photo data by ID

            // Prepare data to pass to the view
            $data = array(
                'title' => 'Edit User',
                'data_user' => $data_user,
                'isi' => 'user/edituser',
            );

            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
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