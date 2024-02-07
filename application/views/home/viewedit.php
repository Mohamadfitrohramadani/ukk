<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profil</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

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

        .judul-font {
            font-size: 20px;
        }
    </style>
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.html">
                    <img src="<?= base_url() ?>logo/logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
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
                            <a class="nav-link" href="index.html">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Album</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="listing-page.html">Listing Page</a></li>

                                <li><a class="dropdown-item" href="detail-page.html">Detail Page</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                    <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                        <a href="<?= base_url('home/profil') ?>">
                            <div class="btn custom-btn custom-border-btn smoothscroll">

                                <img src="<?= base_url('assets/user/' . $this->session->userdata('foto_user')); ?>"
                                    alt="Profile Picture" style="width: 30px; height: 25px; border-radius: 50%;">
                                <?= $this->session->userdata('username'); ?>
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


        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <img src="<?= base_url() ?>assets/user/194935.png" alt="Your Image" class="img-fluid mb-3"
                            style="max-width: 150px;">

                        <!-- Membungkus tombol-tombol dalam div -->
                        <div class="buttons-wrapper">
                            <a href="#section_2" class="btn custom-btn ">Edit Profil</a>
                            <a href="#section_2" class="btn custom-btn ">Album</a>
                            <a href="#section_2" class="btn custom-btn ">Aploud Foto</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>




        </section>
        <section class="latest-podcast-section section-padding" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Edit Profil</h4>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a class="custom-block-image-wrap">
                                        <img src="<?= base_url() ?>temhome/images/podcast/11683425_4790593.jpg"
                                            class="custom-block-image img-fluid" alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="small-font">
                                    <a> <i class="bi bi-person-badge-fill"></i>
                                        Username
                                    </a>
                                </h5>
                                <h5 class="small-font">
                                    <a> <i class="bi bi-envelope-fill"></i>
                                        Email@gmail.com
                                    </a>
                                </h5>
                                <h5 class="small-font">
                                    <a> <i class="bi bi-person-badge"></i>
                                        Nama Lengkap
                                    </a>
                                </h5>
                                <h5 class="small-font">
                                    <a> <i class="bi bi-geo-fill"></i>
                                        Alamat
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>

                    <!-- application/views/edit_profile.php -->

                    <?php echo form_open_multipart('home/update/' . $user_data['user_id'], 'class="user-form"'); ?>
                    <div class="form-group">
                        <label for="input-1">Foto User</label>
                        <input type="text" name="foto_user" class="form-control" id="input-1"
                            value="<?= base_url('assets/user/' . $user_data['foto_user']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="input-2">Username</label>
                        <input type="text" name="username" class="form-control" id="input-2"
                            value="<?= $user_data['username'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="input-3">Email</label>
                        <input type="email" name="email" class="form-control" id="input-3"
                            value="<?= $user_data['email'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="input-4">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="input-4"
                            value="<?= $user_data['nama_lengkap'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="input-5">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="input-5"
                            value="<?= $user_data['alamat'] ?>" required>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn custom-btn">SAVE</button>
                    </div>
                    <?php echo form_close(); ?>



                </div>
            </div>
        </section>



    </main>


    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="subscribe-form-wrap">
                        <h6>Subscribe. Every weekly.</h6>

                        <form class="custom-form subscribe-form" action="#" method="get" role="form">
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Email Address" required="">

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control" id="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contact</h6>

                    <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> 010-020-0340</p>

                    <p>
                        <strong class="d-inline me-2">Email:</strong>
                        <a href="#">inquiry@pod.co</a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <h6 class="site-footer-title mb-3">Download Mobile</h6>

                    <div class="site-footer-thumb mb-4 pb-2">
                        <div class="d-flex flex-wrap">
                            <a href="#">
                                <img src="<?= base_url() ?>temhome/images/app-store.png"
                                    class="me-3 mb-2 mb-lg-0 img-fluid" alt="">
                            </a>

                            <a href="#">
                                <img src="<?= base_url() ?>temhome/images/play-store.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <h6 class="site-footer-title mb-3">Social</h6>

                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container pt-5">
            <div class="row align-items-center">

                <div class="col-lg-2 col-md-3 col-12">
                    <a class="navbar-brand" href="index.html">
                        <img src="<?= base_url() ?>temhome/images/pod-talk-logo.png" class="logo-image img-fluid"
                            alt="templatemo pod talk">
                    </a>
                </div>

                <div class="col-lg-7 col-md-9 col-12">
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Homepage</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Browse episodes</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Help Center</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-12">
                    <p class="copyright-text mb-0">Copyright © 2036 Talk Pod Company
                        <br><br>
                        Design: <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url() ?>temhome/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/custom.js"></script>

</body>

</html>