<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">

  <title>LuxeLens-Detail</title>

  <!-- CSS FILES -->
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="<?= base_url('logo/6c.jpg') ?>" type="" style="widht: 200px; height: 200px;">
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

    .btn-sm {
      padding: 5px 10px;
      font-size: 8px;
    }

    .trash-komen {
      background-color: rgb(169, 169, 169);
      margin-left: 700px;

    }

    .font-judul {
      font-size: 25px;
    }

    .detail {
      padding-bottom: 50px;
    }

    .teks-username {
      font-size: 13px;
    }

    .comments {
      max-height: 300px;
      /* Atur ketinggian maksimum komentar di sini */
      overflow-y: auto;
      /* Tambahkan overflow-y: auto agar dapat di-scroll jika terlalu banyak */
    }

    .gambar {
      margin-left: 20px;
      border-radius: 20px;
    }
  </style>


</head>

<body>

  <main>

    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand me-lg-5 me-0" href="<?= base_url('home') ?>">
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
              <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/uploadfoto') ?>">Upload Foto</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link"
                href="<?php echo base_url('home/editprofil/') . $this->session->userdata('user_id') ?>">Profil</a>
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
              <a href="<?= base_url('login') ?>" class="btn custom-btn custom-border-btn smoothscroll">Login</a>
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
    <div class="comment-box">
  <div class="row">
    <div class="d-flex align-items-center">
      <div class="custom-block-image-wrap">
        <a href="">
          <h6 class="nama-foto">
            <a href="">Nama Foto</a>
          </h6>
          <img src="<?= base_url() ?>temhome/images/podcast/27376480_7326766.jpg" class="custom-block-image img-fluid"
            alt="" style="width: 100%; height: auto; max-width: 400px;">
          <div class="custom-block-bottom d-flex justify-content-between mt-1" style="margin-top: -5px;">
            <a href="#" class="bi-heart me-1">
              <span>2.5k</span>
            </a>
            <a href="#" class="bi-chat me-1">
              <span>924k</span>
            </a>
          </div>
        </a>
      </div>
      <div class="custom-block-info ms-2 user" style="width: calc(100% - 400px);">
        <div class="profile-block d-flex align-items-center">
          <img src="<?= base_url() ?>temhome/images/profile/woman-posing-black-dress-medium-shot.jpg"
            class="profile-block-image img-fluid me-2" style="width: 25px; height: 25px; border-radius: 50%;" alt="">
          <p class="mb-0 na-peng" style="margin-top: -5px;">Nama Pengguna</p>
        </div>
        <div class="comment-content">
          <p class="teks-kom" style="word-wrap: break-word;">
            komentarkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
          </p>
          <p class="comment-date small-font">12-02-2034</p>
        </div>
      </div>
    </div>
  </div>
</div>




  </main>


  <!-- JAVASCRIPT FILES -->
  <script src="<?= base_url() ?>temhome/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>temhome/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>temhome/js/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>temhome/js/custom.js"></script>

</body>

</html>