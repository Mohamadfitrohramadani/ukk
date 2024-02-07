<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {
	
	public function __construct()
	{
       parent::__construct();
	   $this->load->model('m_foto');
       
	}

	public function index()
	{
        $data = array (
            'title' => 'Foto',
			'foto' => $this->m_foto->get_all_data(),
            'isi' => 'foto/v_foto',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

    // Add a new item
    public function add() {
        // Load necessary libraries
        $this->load->library('upload');
        $this->load->library('form_validation');

        // Set form validation rules
        $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required');
        $this->form_validation->set_rules('des_foto', 'Deskripsi Foto', 'required');
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
                    'judul_foto'   => $this->input->post('judul_foto'),
                    'des_foto'     => $this->input->post('des_foto'),
                    'tgl_unggah'   => date('Y-m-d H:i:s'),
                    'lokasi_file'  => $upload_data['file_name'],
                    'album_id'     => $this->input->post('album_id'),
                    'user_id'      => $this->input->post('user_id'),
                );

                // Save data to the database
                $this->m_foto->add($data); // Assuming you have an "add" method in your model

                // Redirect or show success message
                redirect('foto'); // Replace "your_controller/success" with your actual success page
            } else {
                // File upload failed
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('layout/v_wrapper_backend', $error); // Replace "your_view" with your actual view for displaying errors
            }
        } else {
            // Form validation failed or initial load
            $data = array(
                'title' => 'Add Foto',
                'foto'  => $this->m_foto->get_all_data(),
                'isi'   => 'foto/v_add',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }
    }

    //Update one item
    public function edit($foto_id) {
        // Load necessary libraries
        $this->load->library('upload');
        $this->load->library('form_validation');
    
        // Set form validation rules
        $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required');
        $this->form_validation->set_rules('des_foto', 'Deskripsi Foto', 'required');
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
                'judul_foto'   => $this->input->post('judul_foto'),
                'des_foto'     => $this->input->post('des_foto'),
                'tgl_unggah'   => date('Y-m-d H:i:s'),
                'album_id'     => $this->input->post('album_id'),
                'user_id'      => $this->input->post('user_id'),
            );
    
            // Check if the file is uploaded successfully
            if ($this->upload->do_upload('lokasi_file')) {
                $upload_data = $this->upload->data();
                $data['lokasi_file'] = $upload_data['file_name'];
    
                // Fetch existing data for the photo with $foto_id from the database
                $existing_data = $this->m_foto->get_foto_by_id($foto_id); // Assuming you have a method in your model to get photo data by ID
    
                // Delete the old file
                if (!empty($existing_data->lokasi_file)) {
                    $old_file_path = './assets/' . $existing_data->lokasi_file;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            }
    
            // Save data to the database
            $this->m_foto->edit($foto_id, $data); // Assuming you have an "edit" method in your model
    
            // Redirect with success message
            $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
            redirect('foto');
        } else {
            // Form validation failed or initial load
            // Fetch existing data for the photo with $foto_id from the database
            $foto_data = $this->m_foto->get_foto_by_id($foto_id); // Assuming you have a method in your model to get photo data by ID
    
            // Prepare data to pass to the view
            $data = array(
                'title' => 'Edit Foto',
                'value' => $foto_data, 
                'isi'   => 'foto/v_edit',
            );
    
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }
    }
    
    
    
    
    //Delete one item
    public function delete($foto_id = NULL)
    {
        // Retrieve the data of the photo to get the file location
        $photo_data = $this->m_foto->get_foto_by_id($foto_id); // Assuming you have a method like "get_by_id" in your model
    
        // Check if the photo data is found
        if ($photo_data) {
            // Build the file path
            $file_path = './assets/' . $photo_data->lokasi_file;
    
            // Check if the file exists before attempting to delete
            if (file_exists($file_path)) {
                // Delete the file
                unlink($file_path);
            }
    
            // Data for deletion
            $data = array('foto_id' => $foto_id);
    
            // Perform the deletion in the database
            $this->m_foto->delete($data);
    
            // Set flashdata and redirect
            $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
            redirect('foto');
        } else {
            // Photo data not found, handle accordingly
            $this->session->set_flashdata('pesan', 'Data Tidak Ditemukan');
            redirect('foto');
        }
    }
    
}

/* End of file User.php */

