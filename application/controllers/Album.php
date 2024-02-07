<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Album extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if (!$this->session->albumdata('email')) {
        //     redirect('login');
        // }

        // $role_id = $this->session->albumdata('role_id');

        // if ($role_id == 2) {

        //     redirect('home');
        // }
        $this->load->model('M_Album');
    }
    public function index()
    {
        $album = $this->M_Album->getDataalbum();
        $DATA = array('data_album' => $album);
        $this->load->view('album/viewalbum', $DATA);
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');

    }

    public function tambahalbum()
    {
        $this->load->view('album/tambahalbum');
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');
    }
    // public function Inputalbum()
    // {
    //     $album_id = $this->input->post('album_id');
    //     $nama_album = $this->input->post('nama_album');
    //     $des = $this->input->post('des');
    //     $tgl_buat = $this->input->post('tgl_buat');
    //     $user_id = $this->input->post('user_id');

    //     $DataInsert = array(
    //         'album_id' => $album_id,
    //         'nama_album' => $nama_album,
    //         'des' => $des,
    //         'tgl_buat' => $tgl_buat,
    //         'user_id' => $user_id
    //     );

    //     if ($this->M_Album->InsertDataalbum($DataInsert)) {
           
    //         $this->session->set_flashdata('success', 'Data album berhasil ditambahkan.');
    //         redirect(base_url('album/'));
    //     } else {
            
    //         $this->session->set_flashdata('error', 'Gagal menambahkan data album.');
    //         redirect(base_url('album/'));
    //     }
    // }

    public function Inputalbum()
    {
        // Form submission logic for creating album
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('M_Album'); // Load the Album model

        // Set form validation rules
        $this->form_validation->set_rules('nama_album', 'Nama Album', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Album', 'required');
        $this->form_validation->set_rules('tgl_buat', 'Tanggal Buat', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');

        // Check if form validation passed
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/album/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';

            // Initialize upload library with the configuration
            $this->upload->initialize($config);

            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('kover')) {
                $upload_data = $this->upload->data();

                // Database data
                $data = array(
                    'nama_album' => $this->input->post('nama_album'),
                    'des' => $this->input->post('des'),
                    'tgl_buat' => $this->input->post('tgl_buat'),
                    'kover' => $upload_data['file_name'],
                    'user_id' => $this->input->post('user_id'),
                );

                // Save data to the database using the model
                $this->M_Album->InsertDataAlbum($data);

                // Redirect or show success message
                redirect('album'); // Replace "your_controller/success" with your actual success page
            } else {
                // File upload failed
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('album/tambahalbum', $error);
                $this->load->view('layout/header');
                $this->load->view('layout/footer');
                $this->load->view('layout/navbar'); // Replace "your_view" with your actual view for displaying errors
            }
        } else {
            // Form validation failed or initial load
            $data = array(
                'title' => 'Add Album',
                'album' => $this->M_Album->get_all_data(),
                'isi' => 'album/tambahalbum',
            );
            $this->load->view('album/tambahalbum', $data, FALSE);
            $this->load->view('layout/header');
            $this->load->view('layout/footer');
            $this->load->view('layout/navbar');
        }
    }
    // public function update($album_id)
    // {
    //     $album = $this->M_Album->getDataalbumDetail($album_id);
    //     $DATA = array('data_album' => $album);
    //     $this->load->view('album/editalbum', $DATA);
    //     $this->load->view('layout/header');
    //     $this->load->view('layout/footer');
    //     $this->load->view('layout/navbar');
    // }
    // public function updatealbum()
    // {
    //     $album_id = $this->input->post('album_id');
    //     $nama_album = $this->input->post('nama_album');
    //     $des = $this->input->post('des');
    //     $tgl_buat = $this->input->post('tgl_buat');
    //     $user_id = $this->input->post('user_id');


    //     $DataUpdate = array(
    //         'album_id' => $album_id,
    //         'nama_album' => $nama_album,
    //         'des' => $des,
    //         'tgl_buat' => $tgl_buat,
    //         'user_id' => $user_id
    //     );

    //     $this->M_Album->UpdateDataalbum($DataUpdate, $album_id);
    //     redirect(base_url('album/'));
    // }
    public function update($album_id)
    {
        $this->load->library('upload');
        $this->load->library('form_validation');

        // Set form validation rules
        $this->form_validation->set_rules('nama_album', 'Nama Album', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Album', 'required');
        $this->form_validation->set_rules('tgl_buat', 'Tanggal Buat', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');


        // Check if form validation passed
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/album';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';

            // Initialize upload library with the configuration
            $this->upload->initialize($config);

            // Database data
            $data = array(
                'nama_album' => $this->input->post('nama_album'),
                'des' => $this->input->post('des'),
                'tgl_buat' => date('Y-m-d H:i:s'),
                'user_id' => $this->input->post('user_id'),
            );

            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('kover')) {
                $upload_data = $this->upload->data();
                $data['kover'] = $upload_data['file_name'];

                // Fetch existing data for the photo with $foto_id from the database
                $existing_data = $this->M_Album->get_album_by_id($album_id); // Assuming you have a method in your model to get photo data by ID

                // Delete the old file
                
                if (!empty($existing_data->kover)) {
                    $old_file_path = './assets/album' . $existing_data->kover;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            }

            // Save data to the database
            $this->M_Album->UpdateDataalbum($album_id, $data); // Assuming you have an "edit" method in your model

            // Redirect with success message
            $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
            redirect('album');
        } else {
            // Form validation failed or initial load
            // Fetch existing data for the photo with $foto_id from the database
            $data_album = $this->M_Album->get_album_by_id($album_id); // Assuming you have a method in your model to get photo data by ID

            // Prepare data to pass to the view
            $data = array(
                'title' => 'Edit Album',
                'data_album' => $data_album,
                'isi' => 'album/editalbum',
            );

            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('album/editalbum', $data, FALSE);
            $this->load->view('layout/footer');

        }
    }
    public function delete($album_id)
    {
        $this->M_Album->DeleteDataalbum($album_id);
        redirect(base_url('album/'));
    }
}