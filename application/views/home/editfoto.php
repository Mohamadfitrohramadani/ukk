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
            font-size: 12px;
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
                            <a class="nav-link " href="<?= base_url('home') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('#') ?>">Upload Gambar</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url('') ?>">Profil</a>
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
                        <img src="<?= base_url('assets/user/' . $this->session->userdata('foto_user')); ?>"
                            alt="Your Image" class="img-fluid mb-3"
                            style="width: 200px; height: 180px; border-radius: 30%;">
                        <div class="name">
                            <strong>
                                <?= $this->session->userdata('username'); ?>
                            </strong>
                        </div>

                        <!-- Membungkus tombol-tombol dalam div -->
                        <div class="buttons-wrapper">

                            <a href="#" class="btn custom-btn ">Edit Profil</a>
                            <a href="#" class="btn custom-btn ">Album</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <section class="contact-section section-padding pt-0">
            <div class="container">
                <div class="row">

                <!-- home/editfoto.php -->

<div class="col-lg-8 col-12 mx-auto">
    <div class="section-title-wrap mb-5">
        <h4 class="section-title">Edit Foto</h4>
    </div>
    <form action="<?= base_url('home/updatefoto/' . $data_foto->foto_id) ?>" method="post" class="custom-form contact-form" role="form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12 col-12">
                <label for="lokasi_file">Foto</label>
                <div class="form-floating">
                    <input type="file" class="form-control" id="lokasi_file" name="lokasi_file">
                    <small>Gambar Saat ini: <img src="<?= base_url('assets/' . $data_foto->lokasi_file); ?>" alt="Preview" width="100"></small>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="form-floating">
                    <input type="text" name="judul_foto" id="judul_foto" value="<?= $data_foto->judul_foto ?>" class="form-control" placeholder="Judul Foto" required="">
                    <label for="judul_foto">Judul Foto</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="form-floating">
                    <input type="date" name="tgl_unggah" id="tgl_unggah" class="form-control" required="" value="<?= $data_foto->tgl_unggah ?>">
                    <label for="tgl_unggah">Tanggal Unggah</label>
                </div>
            </div>
            <div class="col-lg-12 col-12">
                <label for="album_id">Album</label>
                <div class="form-floating">
                    <select class="form-control" name="album_id" id="album_id" required="">
                        <?php foreach ($data_album as $album) { ?>
                            <?php if ($album->album_id == $data_foto->album_id) { ?>
                                <option value="<?= $album->album_id; ?>" selected>
                                    <?= $album->nama_album; ?>
                                </option>
                            <?php } else { ?>
                                <option value="<?= $album->album_id; ?>">
                                    <?= $album->nama_album; ?>
                                </option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <label for="album_id">Pilih Album</label>
                </div>
            </div>
            <div class="col-lg-12 col-12">
                <div class="form-floating">
                    <textarea class="form-control" id="des_foto" name="des_foto" placeholder="Deskripsi Foto" required=""><?= $data_foto->des_foto ?></textarea>
                    <label for="des_foto">Deskripsi Foto</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 ms-auto">
            <button type="submit" class="form-control">Submit</button>
        </div>
    </form>
</div>


            </div>
            </div>
        </section>
        <!-- <section class="related-podcast-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">Foto</h4>
                            </div>
                        </div>
                        <?php foreach ($fotos as $foto): ?>
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="detail-page.html">
                                        <img src="<?= base_url() ?>assets/<?php echo $foto->lokasi_file; ?>" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="detail-page.html">
                                        <?php echo $foto->judul_foto; ?>
                                        </a>
                                    </h5>
                                    <p class="small-font">Tggl Unggah:
                                    <?php echo date('d F Y', strtotime($foto->tgl_unggah)); ?>
                                </p>
                                 
                                  <?php if ($this->session->userdata('user_id')): ?>
                                    <?php
                                    $user_id = $this->session->userdata('user_id');
                                    $likeCount = $like_model->getLikeCount($foto->foto_id);
                                    ?>

                                    <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                        <a class="bi-heart me-1">
                                            <span><?= $likeCount ?></span>
                                        </a>

                                        <a class="bi-chat me-1">
                                            <span><?= $commentCounts[$foto->foto_id] ?></span>
                                        </a>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="social-share d-flex flex-column ms-auto">
                                    <a href="#" class="badge ms-auto">
                                    <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <a href="<?php echo base_url('home/delete/') . $foto->foto_id ?>" class="badge ms-auto">
                                    <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section> -->



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