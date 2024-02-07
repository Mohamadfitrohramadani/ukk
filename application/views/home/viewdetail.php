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
                    <img src="<?= base_url() ?>logo/logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
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
                            <a class="nav-link active" href="<?= base_url('home')?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('home/album')?>">Album</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('#')?>">Upload Gambar</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="<?= base_url('')?>">Profil</a>
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


        <section class="latest-podcast-section section-padding pb-0" id="section_2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="row profile-detail-block">
                        <div class="col-lg-3 col-12">
                            <div class="custom-block-icon-wrap">
                                <div class="custom-block-image-wrap custom-block-image-detail-page">
                                    <img src="<?= base_url('assets/' . $detail_data->lokasi_file); ?>"
                                        class="custom-block-image img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12">
                            <div class="custom-block-info">
                                <h2 class="mb-2">
                                    <?= $detail_data->judul_foto ?>
                                </h2>
                                <div class="custom-block-top d-flex mb-1">
                                    <small>
                                        <i class=" custom-icon"></i> Tanggal Unggah:
                                        <?= date('d F Y', strtotime($detail_data->tgl_unggah)); ?>
                                    </small>
                                </div>
                                <div class="product-descc" id="productDescription">
                                    <p>
                                        <span class="short-descc">
                                            <?= substr($detail_data->des_foto, 0, 65); ?>...
                                        </span>
                                        <span class="full-descc" style="display: none;">
                                            <?= $detail_data->des_foto; ?>
                                        </span>
                                        <a class="toggle-link" href="javascript:void(0);"
                                            onclick="toggleDescription(this)">Lihat Selengkapnya</a>
                                    </p>
                                </div>

                                <script>
                                    function toggleDescription(link) {
                                        var parentDiv = link.closest('.product-descc');
                                        var shortDesc = parentDiv.querySelector('.short-descc');
                                        var fullDesc = parentDiv.querySelector('.full-descc');

                                        if (shortDesc.style.display === 'none' || shortDesc.style.display === '') {
                                            shortDesc.style.display = 'inline';  // Mengganti 'block' menjadi 'inline'
                                            fullDesc.style.display = 'none';
                                            link.innerHTML = 'Lihat Selengkapnya';
                                        } else {
                                            shortDesc.style.display = 'none';
                                            fullDesc.style.display = 'inline';
                                            link.innerHTML = 'Sembunyikan';
                                        }
                                    }
                                </script>

                                <!-- Bagian Like dan Komentar -->
                                <div class="interaction-section mt-3">
                                    <?php if ($this->session->userdata('user_id')): ?>
                                        <?php
                                        $user_id = $this->session->userdata('user_id');
                                        $isLiked = $this->M_Like->isLiked($foto_id, $user_id);
                                        $likeCount = $this->M_Like->getLikeCount($foto_id);
                                        ?>

                                        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                                            <a href="<?= base_url('like/' . ($isLiked ? 'unlike' : 'like') . '/' . $foto_id) ?>"
                                                class="bi-heart me-1" id="likeIcon">
                                                <span>
                                                    <?= $likeCount ?>
                                                </span>
                                            </a>
                                        <?php else: ?>
                                            <!-- Tombol like yang ditampilkan jika role_id bukan 1 atau 2 -->
                                            <a href="<?= base_url('login') ?>" class="bi-heart me-1" id="likeIcon">
                                                <span>
                                                    <?= $likeCount ?>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <a class="bi-chat me-1" id="commentIcon" onclick="toggleCommentForm()">
                                        <span>0</span>
                                    </a>
                                </div>
                                <!-- Tempat Komentar -->
                                <!-- application/views/komentar/view_komentar.php -->
                                <div class="comments mt-3" id="commentsSection">
                                    <?php if (!empty($comments)): ?>
                                        <?php foreach ($comments as $comment): ?>
                                            <div class="comment">
                                                <?php if (isset($comment->foto_user)): ?>
                                                    <img src="<?= base_url() ?>assets/user/<?= $comment->foto_user ?>"
                                                        class="comment-user-image img-fluid" alt=""
                                                        style="width: 30px; height: 25px; border-radius: 50%;">
                                                <?php else: ?>
                                                    <!-- Tambahkan placeholder atau gambar default jika foto_user tidak tersedia -->
                                                    <img src="<?= base_url() ?>assets/user/placeholder.jpg"
                                                        class="comment-user-image img-fluid" alt=""
                                                        style="width: 30px; height: 25px; border-radius: 50%;">
                                                <?php endif; ?>
                                                <strong>
                                                    <?php if (isset($comment->username)): ?>
                                                        <?= $comment->username ?>
                                                    <?php else: ?>
                                                        <!-- Tambahkan placeholder atau teks default jika username tidak tersedia -->
                                                        Nama User
                                                    <?php endif; ?>
                                                </strong>
                                                <div class="comment-content">
                                                    <p>
                                                        <?= $comment->isi_komen ?>
                                                    </p>
                                                    <p class="comment-date small-font">
                                                        <?= $comment->tgl_komen ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <!-- Form untuk Komentar -->
                                    <div class="comment-form mt-3" id="commentForm">
                                        <form action="<?= base_url('komentar/submitComment') ?>" method="post">
                                            <input type="hidden" name="foto_id" value="<?= $foto_id ?>">
                                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                            <div class="form-group">
                                                <textarea name="isi_komen" class="form-control"
                                                    placeholder="Tulis komentar Anda"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Komentar</button>
                                        </form>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>

                    <script>
                        function toggleLike() {
                            // Logika untuk menangani like
                            alert("Menyukai konten...");
                        }

                        function toggleCommentForm() {
                            var commentForm = document.getElementById("commentForm");
                            commentForm.style.display = commentForm.style.display === "none" ? "block" : "none";
                        }
                    </script>


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