<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Galery</title>

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
<!-- CSS Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- JavaScript Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <style>
        .liked {
            color: red;
            /* Atur warna merah sesuai keinginan */
        }

        .custom-block {
            margin-bottom: 20px;
            /* Tambahkan margin bottom di sini */
        }

        .has11 {
            padding-top: 5px;
        }

        .custom-block1 {
            border: 2px solid var(--primary-color);
            border-radius: var(--border-radius-medium);
            position: relative;
            overflow: hidden;
            padding: 30px;
            transition: all 0.3s ease;


        }

        .custom-block1::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(to right, rgba(0, 255, 255, 0.5), transparent, transparent, rgba(240, 248, 255, 0.5));
            filter: blur(20px);
            z-index: -1;
        }

        .kots::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(to right, rgb(43, 191, 254), rgb(62, 254, 255), rgba(0, 255, 255, 0.5), transparent, transparent, rgba(240, 248, 255, 0.5));
            filter: blur(10px);
            z-index: -1;
        }

        .album {
            padding-top: 10px;
        }
        .nama-album {
            padding-bottom: 40px;
            text-align: center;
            font-size: 15px;
        }

        
    .owl-carousel .owl-stage {
        margin: 0; /* Atur margin menjadi 0 */
        padding: 0 5px; /* Beri sedikit padding untuk memastikan item berada di tengah */
    }

    .owl-carousel .owl-item {
        margin-right: 0; /* Hapus margin-right */
    }
    .owl-dots {
        margin-top: -50px; /* Sesuaikan nilai negatif ini untuk mengatur jarak */
    }

        .custom-block1:hover {
            background: var(--white-color);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);
            border-color: transparent;
            transform: translateY(-3px);
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
                    <img src="<?= base_url() ?>logo/b.png" class="logo-image img-fluid" alt="">
                </a>

                <form action="<?= base_url('home/search') ?>" method="get"
                    class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Galeri"
                            aria-label="Search">
                        <button type="submit" class="btn btn-primary"> <!-- Ubah class sesuai kebutuhan -->
                            <i class="bi bi-search"></i> <!-- Gunakan class ikon yang sesuai -->
                        </button>
                    </div>
                </form>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('home/uploadfoto') ?>">Upload Foto</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link"
                                    href="<?php echo base_url('home/editprofil/') . $this->session->userdata('user_id') ?>">Profil</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('login') ?>">Upload Foto</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="<?= base_url('login') ?>">Profil</a>
                            </li>
                        <?php endif; ?>

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
        <section class="topics-section album section-padding pb-0" id="section_3">
            <div class="container ">
                <div class="row ">
                <?php foreach ($data_album as $row) {?>
                    <div class="col-lg-2  col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block-info custom-block-overlay-info">
                            <h5 class="mb-0 ">
                            </h5>
                        </div>
                        <div class="custom-block kots custom-block-overlay">
                            <a href="" class="custom-block-image-wrap">
                                <img src="<?= base_url('assets/album/' . $row->kover); ?>" class="custom-block-image img-fluid" alt=""
                                style="widht:100px; height:200px;">
                                
                            </a>
                            
                        </div>
                        <div class="nama-album ">
                            <a>
                            <?php echo $row->nama_album ?>
                            </a>
                        </div>
                    </div>

                    
                    <?php } ?>


                </div>
            </div>
        </section>




<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0, // Atur margin keseluruhan slider
            responsiveClass: true,
            responsive:{
                0:{
                    items: 1,
                    nav: true
                },
                600:{
                    items: 3,
                    nav: false
                },
                1000:{
                    items: 5,
                    nav: true,
                    loop: false
                }
            },
            navText: ["<i class='bi bi-arrow-left'></i>", "<i class='bi bi-arrow-right'></i>"],
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            autoHeight: true
        });
    });
</script>

       
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url() ?>temhome/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/custom.js"></script>

    <script>
        function toggleDescription(foto_id) {
            var shortDesc = document.querySelector('#productDescription' + foto_id + ' .short-descc');
            var fullDesc = document.querySelector('#productDescription' + foto_id + ' .full-descc');
            var link = document.querySelector('#productDescription' + foto_id + ' .toggle-link');

            if (shortDesc.style.display === 'none' || shortDesc.style.display === '') {
                shortDesc.style.display = 'block';
                fullDesc.style.display = 'none';
                link.innerHTML = 'Lihat Selengkapnya';
            } else {
                shortDesc.style.display = 'none';
                fullDesc.style.display = 'block';
                link.innerHTML = 'Lihat Lebih Sedikit';
            }
        }


    </script>

</body>

</html>

