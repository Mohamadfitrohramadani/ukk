<?php
defined('BASEPATH') or exit('No direct script access allowed');

class foto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if (!$this->session->fotodata('email')) {
        //     redirect('login');
        // }

        // $role_id = $this->session->fotodata('role_id');

        // if ($role_id == 2) {

        //     redirect('home');
        // }
        $this->load->model('M_Foto');
        $this->load->model('M_User');
    }
    public function index()
    {
        $DATA['data_foto'] = $this->M_Foto->getDataFoto();
        
        // $foto = $this->M_Foto->getDatafoto();
        
        // $DATA = array('data_foto' => $foto);
        $this->load->view('foto/viewfoto', $DATA,);
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $this->load->view('layout/navbar');
    }
    public function tambahfoto()
    {
        $this->load->model('M_User');  // Pastikan model M_User sudah dimuat
        $this->load->model('M_Album'); // Memuat model M_Album

        $data_user = $this->M_User->getDatauser();
        $data_album = $this->M_Album->getDataalbum();

        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('foto/tambahfoto', ['data_user' => $data_user, 'data_album' => $data_album]);
        $this->load->view('layout/footer');
    }
    
    
    
    public function Inputfoto()
    {
        // Form submission logic for creating foto
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('M_Foto'); // Load the Foto model

        // Set form validation rules
        $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required');
        $this->form_validation->set_rules('des_foto', 'Deskripsi Foto', 'required');
        $this->form_validation->set_rules('tgl_unggah', 'Tanggal Unggah', 'required');
        $this->form_validation->set_rules('album_id', 'Album ID', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');

        // Check if form validation passed
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';

            // Initialize upload library with the configuration
            $this->upload->initialize($config);

            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('lokasi_file')) {
                $upload_data = $this->upload->data();

                // Database data
                $data = array(
                    'judul_foto' => $this->input->post('judul_foto'),
                    'des_foto' => $this->input->post('des_foto'),
                    'tgl_unggah' => $this->input->post('tgl_unggah'),
                    'lokasi_file' => $upload_data['file_name'],
                    'album_id' => $this->input->post('album_id'),
                    'user_id' => $this->input->post('user_id'),
                );

                // Save data to the database using the model
                $this->M_Foto->InsertDatafoto($data);

                // Redirect or show success message
                redirect('foto'); // Replace "your_controller/success" with your actual success page
            } else {
                // File upload failed
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('foto/tambahfoto', $error);
                $this->load->view('layout/header');
                $this->load->view('layout/footer');
                $this->load->view('layout/navbar'); // Replace "your_view" with your actual view for displaying errors
            }
        } else {
            // Form validation failed or initial load
            $data = array(
                'title' => 'Add Foto',
                'foto' => $this->M_Foto->get_all_data(),
                'isi' => 'foto/tambahfoto',
            );
            $this->load->view('foto/tambahfoto', $data, FALSE);
            $this->load->view('layout/header');
            $this->load->view('layout/footer');
            $this->load->view('layout/navbar');
        }
    }

    public function update($foto_id)
    {
        $this->load->library('upload');
        $this->load->library('form_validation');
    
        // Set form validation rules
        $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required');
        $this->form_validation->set_rules('des_foto', 'Deskripsi Foto', 'required');
        $this->form_validation->set_rules('tgl_unggah', 'Tanggal Unggah', 'required');
        $this->form_validation->set_rules('album_id', 'Album ID', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
    
        // Check if form validation passed
        if ($this->form_validation->run() == TRUE) {
            // Set upload configuration
            $config['upload_path'] = './assets/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '10000';
    
            // Initialize upload library with the configuration
            $this->upload->initialize($config);
    
            // Database data
            $data = array(
                'judul_foto' => $this->input->post('judul_foto'),
                'des_foto' => $this->input->post('des_foto'),
                'tgl_unggah' => $this->input->post('tgl_unggah'),  // Update with the posted value
                'album_id' => $this->input->post('album_id'),
                'user_id' => $this->input->post('user_id'),
            );
    
            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('lokasi_file')) {
                $upload_data = $this->upload->data();
                $data['lokasi_file'] = $upload_data['file_name'];
    
                // Fetch existing data for the photo with $foto_id from the database
                $existing_data = $this->M_Foto->get_foto_by_id($foto_id); // Assuming you have a method in your model to get photo data by ID
    
                // Delete the old file
                if (!empty($existing_data->lokasi_file)) {
                    $old_file_path = './assets/' . $existing_data->lokasi_file;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            }
    
            // Save data to the database
            $this->M_Foto->UpdateDatafoto($foto_id, $data); // Assuming you have an "edit" method in your model
    
            // Redirect with success message
            $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
            redirect('foto');
        } else {
            // Form validation failed or initial load
            // Fetch existing data for the photo with $foto_id from the database
            $data_foto = $this->M_Foto->get_foto_by_id($foto_id); // Assuming you have a method in your model to get photo data by ID
            $data_user = $this->M_User->getDatauser(); 
    
            // Prepare data to pass to the view
            $data = array(
                'title' => 'Edit Foto',
                'data_foto' => $data_foto,
                'data_user' => $data_user,
                'isi' => 'foto/editfoto',
            );
    
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('foto/editfoto', $data, FALSE);
            $this->load->view('layout/footer');
        }
    }
    
    public function delete($foto_id)
    {
        $this->M_Foto->DeleteDatafoto($foto_id);
        redirect(base_url('foto/'));
    }

}
