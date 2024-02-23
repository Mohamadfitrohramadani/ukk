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
        $this->load->model('M_Album');
        $this->load->model('M_Komen');

    }

    // Controller Home
    public function index()
    {
        $data['data_user'] = $this->M_User->getDatauser();
        $data['data_foto'] = $this->M_Foto->getDatafoto();
        $data['data_album'] = $this->M_Album->getDataalbum();
    
        foreach ($data['data_foto'] as $foto) {
            $foto_id = $foto->foto_id;
            $data['likeCounts'][$foto_id] = $this->M_Like->getLikeCount($foto_id);
            $data['commentCounts'][$foto_id] = $this->M_Komen->getCommentCount($foto_id);
        }
    
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
    
            foreach ($data['data_foto'] as $foto) {
                $foto_id = $foto->foto_id;
                $data['isLiked'][$foto_id] = $this->M_Like->isLiked($foto_id, $user_id);
            }
    
            // Inisialisasi variabel $user_id
            $data['user_id'] = $user_id;
        }
       
    
        $this->load->view('home/viewhome', $data);
    }
    public function kembali_ke_halaman_sebelumnya() {
        // Mengecek apakah ada referer sebelumnya
        if (isset($_SERVER['HTTP_REFERER'])) {
            // Menggunakan fungsi redirect untuk kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // Jika tidak ada referer, bisa diarahkan ke halaman lain
            redirect('halaman_yang_ditentukan');
        }
    }
    
    public function liketerbanyak()
    {
        $data['data_user'] = $this->M_User->getDatauser();
        $data['data_foto'] = $this->M_Foto->getDatafoto();
        $data['data_album'] = $this->M_Album->getDataalbum();

        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');

            foreach ($data['data_foto'] as $foto) {
                $foto_id = $foto->foto_id;
                $data['isLiked'][$foto_id] = $this->M_Like->isLiked($foto_id, $user_id);
                $data['likeCounts'][$foto_id] = $this->M_Like->getLikeCount($foto_id);
                $data['commentCounts'][$foto_id] = $this->M_Komen->getCommentCount($foto_id); // Ambil total komentar
            }

            // Inisialisasi variabel $user_id
            $data['user_id'] = $user_id;
        }

        $this->load->view('home/populer/viewliketerbanyak', $data);
    }

    public function komenterbanyak()
    {
        $data['data_user'] = $this->M_User->getDatauser();
        $data['data_foto'] = $this->M_Foto->getDatafoto();
        $data['data_album'] = $this->M_Album->getDataalbum();


        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');

            foreach ($data['data_foto'] as $foto) {
                $foto_id = $foto->foto_id;
                $data['isLiked'][$foto_id] = $this->M_Like->isLiked($foto_id, $user_id);
                $data['likeCounts'][$foto_id] = $this->M_Like->getLikeCount($foto_id);
                $data['commentCounts'][$foto_id] = $this->M_Komen->getCommentCount($foto_id); // Ambil total komentar
            }

            // Inisialisasi variabel $user_id
            $data['user_id'] = $user_id;
        }

        $this->load->view('home/populer/viewkomenterbanyak', $data);
    }


    public function input_foto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->load->library('upload');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required');
            $this->form_validation->set_rules('des_foto', 'Deskripsi Foto', 'required');
            $this->form_validation->set_rules('tgl_unggah', 'Tanggal Unggah', 'required');
            $this->form_validation->set_rules('album_id', 'Album ID', 'required');

            if ($this->form_validation->run() == TRUE) {

                $config['upload_path'] = './assets/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                $config['max_size'] = '10000';
                $this->upload->initialize($config);

                // Ambil user_id dari session
                $user_id = $this->session->userdata('user_id');

                if ($this->upload->do_upload('lokasi_file')) {
                    $upload_data = $this->upload->data();

                    // Database data
                    $data = array(
                        'judul_foto' => $this->input->post('judul_foto'),
                        'des_foto' => $this->input->post('des_foto'),
                        'tgl_unggah' => $this->input->post('tgl_unggah'),
                        'lokasi_file' => $upload_data['file_name'],
                        'album_id' => $this->input->post('album_id'),
                        'user_id' => $user_id, //user_id ini mengambil dari session
                    );

                    $this->M_Foto->InsertDatafoto($data);

                    redirect('home/uploadfoto');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('view/home', $error);

                }
            }
        }

        $this->load->view('home/viewhome');
    }

    public function album()
    {
        $album = $this->M_Album->getDataalbum();
        $DATA = array('data_album' => $album);
        $this->load->view('home/viewalbum', $DATA);
    }


    //Bagian halaman Upload 
    public function uploadfoto()
    {
        $user_id = $this->session->userdata('user_id');

        // Panggil fungsi getFotoByIdUser dari model M_foto
        $data['fotos'] = $this->M_Foto->getFotoByIdUser($user_id);
        $data['data_album'] = $this->M_Album->getDataalbum();

        // Inisialisasi array untuk menyimpan jumlah komentar
        $data['commentCounts'] = array();

        // Ambil jumlah komentar untuk setiap foto
        foreach ($data['fotos'] as $foto) {
            $foto_id = $foto->foto_id;
            $data['commentCounts'][$foto_id] = $this->M_Komen->getCommentCount($foto_id);
        }

        $currentDate = date('Y-m-d');

        // Memuat view dengan melewatkan tanggal saat ini
        $data['currentDate'] = $currentDate;
        // Misalnya, ambil data user dari model atau sesuai kebutuhan
        $data['user_foto'] = $this->M_Foto->getDatafoto();
        $data['like_model'] = $this->M_Like;

        $this->load->view('home/viewuploadfoto', $data);
    }
    public function updatefoto($foto_id)
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
            redirect('home/uploadfoto');
        } else {
            // Form validation failed or initial load
            // Fetch existing data for the photo with $foto_id from the database
            $data_foto = $this->M_Foto->get_foto_by_id($foto_id); // Assuming you have a method in your model to get photo data by ID
            $data_user = $this->M_User->getDatauser();

            // Get data from album table
            $data_album = $this->M_Album->getDataalbum(); // Assuming you have a method in your M_Album model to get album data

            // Prepare data to pass to the view
            $data = array(
                'title' => 'Edit Foto',
                'data_foto' => $data_foto,
                'data_user' => $data_user,
                'data_album' => $data_album, // Pass album data to the view
                'isi' => 'home/editfoto',
            );

            $this->load->view('home/editfoto', $data, FALSE);
        }
    }



    public function editprofil($user_id)
    {
        // Load necessary libraries
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

            // Ambil kembali data pengguna yang telah diperbarui dari database
            $data_user_updated = $this->M_User->get_user_by_id($user_id);

            // Kirim data pengguna yang telah diperbarui ke tampilan
            $data['data_user'] = $data_user_updated;

            // Redirect with success message
            $this->session->set_flashdata('success_message', 'Foto berhasil diupdate.');
            redirect(base_url('home/edituser/') . $this->session->userdata('user_id'));
        } else {
            // Form validation failed or initial load
            // Fetch existing data for the photo with $user_id from the database
            $data_user = $this->M_User->get_user_by_id($user_id); // Assuming you have a method in your model to get photo data by ID

            // Prepare data to pass to the view
            $data = array(
                'title' => 'Edit User',
                'data_user' => $data_user,
                'isi' => 'home/viewedit',
            );

            $this->load->view('home/viewedit', $data, FALSE);
        }
    }
    public function search()
{
    $search = $this->input->get('search');
    $data['search_result'] = $this->M_Foto->searchData($search);
    
    // Ambil data pengguna sekali saja di awal
    $data['data_user'] = $this->M_User->getDatauser();

    // Periksa apakah hasil pencarian tidak kosong
    if (!empty($data['search_result'])) {
        // Periksa apakah user sudah login
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');

            foreach ($data['search_result'] as $foto) {
                $foto_id = $foto->foto_id;
                $data['isLiked'][$foto_id] = $this->M_Like->isLiked($foto_id, $user_id);
                $data['likeCounts'][$foto_id] = $this->M_Like->getLikeCount($foto_id);
                $data['commentCounts'][$foto_id] = $this->M_Komen->getCommentCount($foto_id); // Ambil total komentar
            }

            // Inisialisasi variabel $user_id
            $data['user_id'] = $user_id;
        }
        // Load view home with search result data
        $this->load->view('home/viewsearch', $data);
    } else {
        // Jika tidak ada hasil pencarian, tampilkan pesan pencarian tidak ditemukan
        $this->load->view('home/error/search');
    }
}

    


public function detail($foto_id)
{
    $this->load->model('M_Foto');
    $this->load->model('M_Komen');
    $this->load->model('M_Like');

    $detail_data = $this->M_Foto->getDataFotoDetail($foto_id);
    $data['comments'] = $this->M_Komen->getCommentsWithUserInfo($foto_id);
    $data['user_id'] = $this->session->userdata('user_id');
    $data['commentCounts'][$foto_id] = $this->M_Komen->getCommentCount($foto_id); // Ambil jumlah komentar

    // Menginisialisasi variabel $isLiked dengan hasil panggilan fungsi isLiked dari model M_Like
    $data['isLiked'][$foto_id] = $this->M_Like->isLiked($foto_id, $data['user_id']);

    // Mengambil jumlah like menggunakan model M_Like
    $data['likeCount'][$foto_id] = $this->M_Like->getLikeCount($foto_id);
    
    $data['foto_id'] = $foto_id;
    $data['detail_data'] = $detail_data;
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

    public function delete($foto_id)
    {
        $this->M_Foto->DeleteDatafoto($foto_id);
        redirect(base_url('home/uploadfoto'));
    }
    public function deletekomen($komen_id)
    {
        // Ambil informasi komentar berdasarkan komen_id
        $komentar = $this->M_Komen->getKomentarById($komen_id);

        // Pastikan komentar ditemukan sebelum melanjutkan
        if ($komentar) {
            // Ambil foto_id dari komentar yang dihapus
            $foto_id = $komentar->foto_id;

            // Hapus komentar berdasarkan komen_id
            $this->M_Komen->DeleteDatakomen($komen_id);

            // Redirect kembali ke halaman detail foto
            redirect('home/detail/' . $foto_id);
        } else {
            // Komentar tidak ditemukan, lakukan penanganan kesalahan sesuai kebutuhan
            // Misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain
            redirect('home');
        }
    }
    
    public function dataalbum($album_id) {
        $data['data_foto'] = $this->M_Foto->get_foto_by_album($album_id);
        $data['data_user'] = $this->M_User->getDatauser();
        $data['foto'] = $this->M_Foto->get_foto_by_album($album_id);
        $data['data_album'] = $this->M_Album->getDataalbum();
        
        // Inisialisasi variabel isLiked, likeCounts, dan commentCounts
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
    
            foreach ($data['data_foto'] as $foto) {
                $foto_id = $foto->foto_id;
                $data['isLiked'][$foto_id] = $this->M_Like->isLiked($foto_id, $user_id);
                $data['likeCounts'][$foto_id] = $this->M_Like->getLikeCount($foto_id);
                $data['commentCounts'][$foto_id] = $this->M_Komen->getCommentCount($foto_id);
            }
    
            // Simpan user_id
            $data['user_id'] = $user_id;
        }
    
        // Load viewalbum view with data
        $this->load->view('home/kategorialbum/viewalbum', $data);
    }
    
    
}