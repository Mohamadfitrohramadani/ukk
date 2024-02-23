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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/bootstrap-icons.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>temhome/css/owl.theme.default.min.css">

    <link href="<?= base_url() ?>temhome/css/templatemo-pod-talk.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
        .trash-komen{
            background-color: 	rgb(169, 169, 169);
            margin-left: 400px;
           
        }
       .font-judul{
        font-size: 25px;
       }
     .detail{
        padding-bottom: 50px;
     }
    .teks-username{
        font-size: 13px;
    }
    .comments {
    max-height: 300px; /* Atur ketinggian maksimum komentar di sini */
    overflow-y: auto; /* Tambahkan overflow-y: auto agar dapat di-scroll jika terlalu banyak */
}
.download{
    color:blue;
   
}
.heart{
    margin-left: 250px;
}
.jum{
    font-size:25px;
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

                

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                  
                    <!-- <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><</a>
                        </li> -->
                    <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('home/uploadfoto') ?>">Upload Foto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?php echo base_url('home/editprofil/') . $this->session->userdata('user_id') ?>">Profil</a>
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
        <section  id="section_2">
            <div class="container">
                <div class="row justify-content-center detail">
                    <div class="row profile-detail-block">
                        <img src="<?= base_url('assets/' . $detail_data->lokasi_file); ?>" class="custom-block-image img-fluid"
                            alt="" style="width: 100%; height: auto; max-width: 600px;">

                        <div class="col-lg-6 col-12">
                            <div class="custom-block-info">
                                <h2 class="mb-1 font-judul">
                                    <?= $detail_data->judul_foto ?> 
                                    <!-- <a href="#" class="heart">
                                <i class="bi bi-heart"></i>
                                    </a> -->
                                    
                                    <?php
                                    $like_url = base_url('like/' . ($isLiked[$foto_id] ? 'unlike' : 'like') . '/' . $foto_id);
                                    $like_class = $isLiked[$foto_id] ? 'liked' : '';
                                    $heart_class = $isLiked[$foto_id] ? 'bi-heart-fill' : 'bi-heart';
                                    $heart_color = $isLiked[$foto_id] ? 'style="color: red;"' : ''; // Menambahkan warna merah jika dilike
                                    ?>

                                        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                                            <a href="<?= $like_url ?>" class="bi <?= $heart_class ?> <?= $like_class ?> me-1 heart"
                                            id="likeIcon" <?= $heart_color ?>>
                                             <span>
                                             <?= $likeCount[$foto_id] ?>
                                            </span>
                                            </a>

                                        <?php else: ?>
                                            <!-- Tombol like yang ditampilkan jika role_id bukan 1 atau 2 -->
                                            <a href="<?= base_url('login') ?>" class="bi-heart me-1 heart" id="likeIcon">
                                                <span class="jum"><?= $likeCount ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('assets/' . $detail_data->lokasi_file); ?>" class="download" download>
                                              <i class="fa fa-download"></i>
                                        </a>

                                </h2>
                                <!-- <div class="custom-block-top d-flex mb-1">
                                    <small>
                                        <i class=" custom-icon"></i> Tanggal Unggah:
                                        <?= date('d F Y', strtotime($detail_data->tgl_unggah)); ?>
                                    </small>
                                </div> -->
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

                                        

                                    <?php endif; ?>

                                    <!-- <a class="bi-chat me-1" id="commentIcon" onclick="toggleCommentForm()">
                                        <span>
                                            <?= $commentCounts[$detail_data->foto_id] ?>
                                        </span>
                                    </a> -->
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
                                                                 <strong class="teks-username">
                                                                     <?php if (isset($comment->username)): ?>
                                                                         <?= $comment->username ?>
                                                                       <?php if ($this->session->userdata('user_id') == $comment->user_id): ?>
                                                                       
                                                                        <a href="<?php echo base_url('home/deletekomen/') . $comment->komen_id ?>" class="btn trash-komen btn-sm">
                                                                        <i class="bi bi-trash-fill"></i></a>
                                                                        <div >
                                                                        </div>
                                                                     <?php endif; ?>

                                                                     <?php else: ?>
                                                                         <!-- Tambahkan placeholder atau teks default jika username tidak tersedia -->
                                                                         Nama User  
                                                                     <?php endif; ?>
                                                                  </strong>
                                                                       <div class="comment-content ">
                                                                      <p class="teks-komen" style="word-wrap: break-word;">
                                                                         <?= $comment->isi_komen ?>
                                                                       </p>

                                                                      <p class="comment-date small-font">
                                                                         <?= $comment->tgl_komen ?>
                                                                     </p>
                      


                                                                 </div>
                                                             </div>
                                                         <?php endforeach; ?>
                                                     <?php endif; ?>
                                </div>
                                                 <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
                                             <div class="comment-form mt-3" id="commentForm">
                                                   <form action="<?= base_url('komentar/submitComment') ?>" method="post" id="commentForm">
                                                        <input type="hidden" name="foto_id" value="<?= $foto_id ?>">
                                                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                                        <div class="input-group">
                                                            <textarea id="isi_komen" name="isi_komen" class="form-control" placeholder="Tulis komentar Anda"></textarea>
                                                            <button type="submit" class="btn btn-primary input-group-text" onclick="return validateForm()">
                                                                <i class="bi bi-chat-left-text"></i> <!-- Icon komentar dari Bootstrap Icons -->
                                                            </button>
                                                        </div>
                                                    </form>


                                                    <script>
                                                        function validateForm() {
                                                            var comment = document.getElementById("isi_komen").value;
                                                            if (comment.trim() == "") {
                                                                alert("Mohon isi komentar Anda.");
                                                                return false; // Mencegah pengiriman formulir
                                                            }
                                                            return true; // Memungkinkan pengiriman formulir jika teks area diisi
                                                        }
                                                    </script>

                                            
                        </div>
                        <?php else: ?>
                         
                        <?php endif; ?>
        <!-- Form untuk Komentar -->
      
   
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

        </section>
    </main>


    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url() ?>temhome/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>temhome/js/custom.js"></script>

</body>

</html>