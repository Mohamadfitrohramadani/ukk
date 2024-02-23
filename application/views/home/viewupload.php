<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail</title>

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
    <link rel="icon" href="<?= base_url('logo/6c.jpg') ?>" type="" style="widht: 200px; height: 200px;">
    <link href="<?= base_url() ?>temhome/css/templatemo-pod-talk.css" rel="stylesheet">
    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
    <style>
        .small-font {
            font-size: 12px;
        }

        .description {
            max-height: 100px;
            /* Sesuaikan tinggi maksimum sesuai kebutuhan */
            overflow: hidden;
            position: relative;
        }

        #longDescription {
            display: none;
        }

        #readMoreLink {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: #fff;
            padding: 5px;
            text-decoration: none;
            color: blue;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.html">
                    <img src="<?= base_url() ?>logo/b.png" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>

                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
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
                            <a class="nav-link active" href="<?= base_url('home') ?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('home/album') ?>">Album</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('#') ?>">Upload Gambar</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url('') ?>">Profil</a>
                        </li>
                    </ul>
                    <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                        <div class="btn custom-btn custom-border-btn smoothscroll">
                            <img src="<?= base_url('assets/user/' . $this->session->userdata('foto_user')); ?>"
                                alt="Profile Picture" style="width: 30px; height: 25px; border-radius: 50%;">
                            <?= $this->session->userdata('username'); ?>
                        </div>
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
            <!-- <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">

                        <h2 class="mb-0">Detail Page</h2>
                    </div>

                </div>
            </div> -->
        </header>
        <section class="contact-section section-padding pt-0">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">You know, Contact Form</h4>
                            </div>

                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                            
                                            <label for="floatingInput">Full Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="company" id="name" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Company</label>
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Describe message here"></textarea>
                                            
                                            <label for="floatingTextarea">Describe message here</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 ms-auto">
                                        <button type="submit" class="form-control">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>


    </main>


    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="branding">
                        <a class="navbar-brand" href="<?= base_url('') ?>">
                            <img src="<?= base_url() ?>logo/bwh.png" style="width: 70%;" class="logo-image img-fluid"
                                alt="templatemo pod talk">
                        </a>
                    </div>
                </div>

                <!-- Bagian kedua footer -->
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contact</h6>
                    <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> +62 896-2715-9368</p>
                    <p>
                        <strong class="d-inline me-2">Email:</strong>
                        <a href="#">visualgallery@gmail.com</a>
                    </p>
                </div>

                <!-- Bagian ketiga footer -->
                <div class="col-lg-3 col-md-6 col-12">
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

        <!-- Bagian keempat footer -->
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <!-- Teks hak cipta di tengah -->
                    <p class="copyright-text mb-0 text-center">Copyright © 2024 Visual Gallery</p>
                </div>

                <!-- Bagian kelima footer -->
                <div class="col-lg-6 col-12 text-end">
                    <!-- Tambahkan elemen lain di sini jika diperlukan -->
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