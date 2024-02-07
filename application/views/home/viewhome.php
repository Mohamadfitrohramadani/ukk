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


        <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">Visual Gallery</h1>

                            <p class="text-white">Nikmati pengalaman untuk menjelajahi foto galeri </p>

                            <!-- <a href="#section_2" class="btn custom-btn smoothscroll mt-3">Start listening</a> -->
                        </div>

                        <!-- <div class="owl-carousel owl-theme">
                            <div class="owl-carousel-info-wrap item">
                                <img src="<?= base_url() ?>temhome/images/profile/smiling-business-woman-with-folded-hands-against-white-wall-toothy-smile-crossed-arms.jpg"
                                    class="owl-carousel-image img-fluid" alt="">

                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">
                                        Candice
                                        <img src="<?= base_url() ?>temhome/images/verified.png"
                                            class="owl-carousel-verified-image img-fluid" alt="">
                                    </h4>

                                    <span class="badge">Storytelling</span>

                                    <span class="badge">Business</span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-facebook"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="<?= base_url() ?>temhome/images/profile/handsome-asian-man-listening-music-through-headphones.jpg"
                                    class="owl-carousel-image img-fluid" alt="">

                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">
                                        William
                                        <img src="<?= base_url() ?>temhome/images/verified.png"
                                            class="owl-carousel-verified-image img-fluid" alt="">
                                    </h4>

                                    <span class="badge">Creative</span>

                                    <span class="badge">Design</span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-facebook"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-pinterest"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="<?= base_url() ?>temhome/images/profile/cute-smiling-woman-outdoor-portrait.jpg"
                                    class="owl-carousel-image img-fluid" alt="">

                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">Taylor</h4>

                                    <span class="badge">Modeling</span>

                                    <span class="badge">Fashion</span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-facebook"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-pinterest"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="<?= base_url() ?>temhome/images/profile/man-portrait.jpg"
                                    class="owl-carousel-image img-fluid" alt="">

                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">Nick</h4>

                                    <span class="badge">Acting</span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-instagram"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-youtube"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="<?= base_url() ?>temhome/images/profile/woman-posing-black-dress-medium-shot.jpg"
                                    class="owl-carousel-image img-fluid" alt="">

                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">
                                        Elsa
                                        <img src="<?= base_url() ?>temhome/images/verified.png"
                                            class="owl-carousel-verified-image img-fluid" alt="">
                                    </h4>

                                    <span class="badge">Influencer</span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-instagram"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-youtube"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="<?= base_url() ?>temhome/images/profile/smart-attractive-asian-glasses-male-standing-smile-with-freshness-joyful-casual-blue-shirt-portrait-white-background.jpg"
                                    class="owl-carousel-image img-fluid" alt="">

                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">Chan</h4>

                                    <span class="badge">Education</span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-linkedin"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>
        </section>


        <section class="latest-podcast-section section-padding pb-0" id="section_2">
            <div class="container">
                <!-- <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Trending Photos</h4>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="detail-page.html" class="custom-block-image-wrap">
                                        <img src="<?= base_url() ?>temhome/images/podcast/11683425_4790593.jpg"
                                            class="custom-block-image img-fluid" alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="#" class="btn custom-btn">
                                        Subscribe
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        <i class="bi-clock-fill custom-icon"></i>
                                        50 Minutes
                                    </small>

                                    <small>Episode <span class="badge">15</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Modern Vintage
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="<?= base_url() ?>temhome/images/profile/woman-posing-black-dress-medium-shot.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        Elsa
                                        <img src="<?= base_url() ?>temhome/images/verified.png"
                                            class="verified-image img-fluid" alt="">
                                        <strong>Influencer</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>120k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>42.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>11k</span>
                                    </a>

                                    <a href="#" class="bi-download">
                                        <span>50k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="detail-page.html" class="custom-block-image-wrap">
                                        <img src="<?= base_url() ?>temhome/images/podcast/12577967_02.jpg"
                                            class="custom-block-image img-fluid" alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="#" class="btn custom-btn">
                                        Subscribe
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        <i class="bi-clock-fill custom-icon"></i>
                                        15 Minutes
                                    </small>

                                    <small>Episode <span class="badge">45</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Daily Talk
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="<?= base_url() ?>temhome/images/profile/handsome-asian-man-listening-music-through-headphones.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>William
                                        <strong>Vlogger</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>140k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>22.4k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>16k</span>
                                    </a>

                                    <a href="#" class="bi-download">
                                        <span>62k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div> -->
            </div>
        </section>
        <section class="trending-podcast-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Photo</h4>
                        </div>
                    </div>
                    <?php if ($this->session->userdata('user_id')): ?>
                        <?php foreach ($data_foto as $row) { ?>
                            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="<?= base_url('home/detail/' . $row->foto_id); ?>">
                                            <img src="<?= base_url('assets/' . $row->lokasi_file); ?>"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>

                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a href="<?= base_url('home/detail/' . $row->foto_id); ?>">
                                                <?php echo $row->judul_foto ?>
                                            </a>
                                        </h5>

                                        <?php foreach ($data_user as $user) { ?>
                                            <?php if ($user->user_id == $row->user_id) { ?>
                                                <div class="profile-block d-flex">
                                                    <img src="<?= base_url('assets/user/' . $user->foto_user); ?>"
                                                        class="profile-block-image img-fluid" alt="">
                                                    <p>
                                                        <?= $user->namalengkap; ?>
                                                        <strong></strong>
                                                    </p>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                        <td>
                                            <small style="color: black;">
                                                Tanggal Unggah:
                                                <?= date('d F Y', strtotime($row->tgl_unggah)); ?>
                                            </small>
                                        </td>


                                        <div class="product-descc" id="productDescription<?= $row->foto_id ?>">
                                            <p>
                                                <span class="short-descc">
                                                    <?= substr($row->des_foto, 0, 65); ?>...
                                                </span>
                                                <span class="full-descc" style="display: none;">
                                                    <?= $row->des_foto; ?>
                                                </span>
                                                <a class="toggle-link" href="javascript:void(0);"
                                                    onclick="toggleDescription(<?= $row->foto_id ?>)">Lihat Selengkapnya</a>
                                            </p>
                                        </div>

                                        <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                                                <?php $like_url = base_url('like/' . ($isLiked[$row->foto_id] ? 'unlikeh' : 'likeh') . '/' . $row->foto_id); ?>
                                                <a href="<?= $like_url ?>" class="bi bi-heart me-1" id="likeIcon">
                                                    <span>
                                                        <?= $likeCounts[$row->foto_id] ?>
                                                    </span>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?= base_url('login') ?>" class="bi bi-heart me-1" id="likeIcon">
                                                    <span>
                                                        <?= $likeCounts[$row->foto_id] ?>
                                                    </span>
                                                </a>
                                            <?php endif; ?>


                                            <a href="#" class="bi-chat me-1">
                                                <span>924k</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="social-share d-flex flex-column ms-auto">
                                        <a href="#" class="badge ms-auto">
                                            <i class="bi-heart"></i>
                                        </a>

                                        <a href="#" class="badge ms-auto">
                                            <i class="bi-bookmark"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endif; ?>

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