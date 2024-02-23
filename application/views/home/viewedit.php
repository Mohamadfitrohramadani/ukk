<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>LuxeLens-Profil</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="<?= base_url('logo/6c.jpg') ?>" type="" style="widht: 200px; height: 200px;">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/bootstrap-icons.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/owl.theme.default.min.css">

    <link href="<?= base_url() ?>temhome/css/templatemo-pod-talk.css" rel="stylesheet">
    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
    <style>
        .buttons-wrapper {
            margin-top: 20px;
        }

        .small-font {
            font-size: 17px;
        }

        .ji {
            font-size: 13px;
        }

        .judul-font {
            font-size: 20px;
        }
        .popup-button {
            position: fixed;
            top: 20px;
            /* Atur jarak dari bawah */
            left: 20px;
            /* Atur jarak dari kanan */
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000;

            /* Pastikan tombol muncul di atas konten lain */
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-10px);
            }
        }

        .popup-button i {
            animation: bounce 0.5s alternate infinite;
        }
    </style>
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="<?= base_url('home')?>">
                    <img src="<?= base_url() ?>logo/b.png" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>

                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Galeri"
                            aria-label="Search">

                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('home/uploadfoto') ?>">Upload Foto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active" href="<?php echo base_url('home/editprofil/') . $this->session->userdata('user_id') ?>">Profil</a>
                        </li>
                    </ul>
                    <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                        <a href="<?php echo base_url('home/editprofil/') . $this->session->userdata('user_id') ?>">
                            <div class="btn custom-btn custom-border-btn smoothscroll">

                            <?php
                                $username = $this->session->userdata('username');
                                $foto_user = $this->session->userdata('foto_user');
                                $foto_user_path = base_url('assets/user/' . $foto_user);
                                $default_foto_path = base_url('logo/user.png'); // Ganti dengan path foto default yang sesuai
                            
                                // Periksa apakah foto pengguna tersedia
                                if ($foto_user && file_exists(FCPATH . 'assets/user/' . $foto_user)) {
                                    $foto_path = $foto_user_path;
                                } else {
                                    $foto_path = $default_foto_path; // Gunakan foto default jika foto pengguna tidak tersedia
                                }
                                ?>

                                <!-- Tampilkan gambar pengguna atau gambar default -->
                                <img src="<?= $foto_path ?>" alt="<?= $foto_path ?>"
                                    style="width: 30px; height: 28px; border-radius: 50%;">
                                <?= $username ?>
                            </div>
                        </a>
                        <div class="btn custom-btn ">
                            <a href="<?= base_url('login/logout') ?>">
                                <span><i class="bi bi-box-arrow-right"></i></span>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="ms-4">
                            <a href="<?= base_url('login') ?>"
                                class="btn custom-btn custom-border-btn smoothscroll">Login</a>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </nav>
        <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                          
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">   <button class="popup-button" onclick="showPopup()"><i class="fas fa-arrow-left"></i></button></a>
        </section>
        <section class="latest-podcast-section section-padding" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title"> Profil</h4>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a class="custom-block-image-wrap">
                                        <img src="<?= base_url('assets/user/' . $data_user->foto_user); ?>"
                                            class="custom-block-image img-fluid" alt="">

                                        <!-- <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a> -->
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="small-font">
                                    <a> <i class="bi bi-person-badge-fill"></i>
                                        <?= $data_user->username; ?>
                                    </a>
                                </h5>
                                <h5 class="small-font">
                                    <a> <i class="bi bi-envelope-fill"></i>
                                        <?= $data_user->email; ?>
                                    </a>
                                </h5>
                                <h5 class="small-font">
                                    <a> <i class="bi bi-person-badge"></i>
                                        <?= $data_user->namalengkap; ?>
                                    </a>
                                </h5>
                                <h5 class="small-font">
                                    <a> <i class="bi bi-geo-fill"></i>
                                        <?= $data_user->alamat; ?>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- application/views/edit_profile.php -->
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                    <h4 class="section-title">Edit Profil</h4>
                        <div class="custom-block d-flex">
                            <?php echo form_open_multipart('home/editprofil/' . $data_user->user_id, 'class="user-form"'); ?>
                            <div class="form-group">
                                <label for="foto_user">Ganti Gambar</label>
                                <input type="file" class="form-control" id="foto_user" name="foto_user">
                                <small>Gambar Saat ini: <img
                                        src="<?= base_url('assets/user/' . $data_user->foto_user); ?>" alt="Preview"
                                        width="100"></small>
                            </div>
                            <!-- <div class="form-group ">
                                <label for="input-1">User Id</label>
                                <input type="text" class="form-control" value="<?php echo $data_user->user_id ?>"
                                    disabled>
                                <input type="hidden" name="user_id" value="<?php echo $data_user->user_id ?>">
                            </div> -->
                            <div class="form-group ">
                                <label for="input-1">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="<?php echo $data_user->username ?>">
                            </div>
                            <div class="form-group">
                                <label for="input-2">password</label>
                                <input type="text" class="form-control" name="password"
                                    value="<?php echo $data_user->password ?>">
                            </div>
                            <div class="form-group">
                                <label for="input-3">Email</label>
                                <input type="text" class="form-control" name="email"
                                    value="<?php echo $data_user->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="input-4">Nama Lengkap</label>
                                <input type="text" class="form-control" name="namalengkap"
                                    value="<?php echo $data_user->namalengkap ?>">
                            </div>
                            <div class="form-group">
                                <label for="input-5">Alamat</label>
                                <input type="text" class="form-control" name="alamat"
                                    value="<?php echo $data_user->alamat ?>">
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5"> Simpan</button>
                                <button type="buttpn" data-dismiss="modal" class="btn btn-light px-5">
                                    Batal</button>
                            </div>
                            <?php echo form_close(); ?>


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url() ?>temhome/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/custom.js"></script>

</body>

</html>