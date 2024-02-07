<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>

</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
       
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();">
                            <i class="fa fa-envelope-open-o"></i></a>
                    </li>
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();">
                            <i class="fa fa-bell-o"></i></a>
                    </li>
                    <li class="nav-item language">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();"><i class="fa fa-flag"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
        <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Update Album</div>
                            <hr>
                            <?php echo form_open_multipart('album/update/' . $data_album->album_id, 'class="album-form"'); ?>
                                <div class="form-group ">
                                    <label for="input-1">Id Album</label>
                                    <input type="text" class="form-control" value="<?php echo $data_album->album_id ?>"
                                        disabled>
                                    <input type="hidden" name="album_id" value="<?php echo $data_album->album_id ?>">
                                </div>
                                <div class="form-group">
                                <label for="kover">Ganti Gambar</label>
                                <input type="file" class="form-control" id="kover" name="kover">
                                <small>Gambar Saat ini: <img src="<?= base_url('assets/album/' . $data_album->kover); ?>"
                                        alt="Preview" width="100"></small>
                            </div>
                                <div class="form-group ">
                                    <label for="input-1">Nama Album</label>
                                    <input type="text" class="form-control" name="nama_album"
                                        value="<?php echo $data_album->nama_album ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-2">Deskripsi</label>
                                    <input type="text" class="form-control" name="des"
                                        value="<?php echo $data_album->des ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Tanggal Buat</label>
                                    <input type="text" class="form-control" name="tgl_buat"
                                        value="<?php echo $data_album->tgl_buat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-5">User Id</label>
                                    <input type="text" class="form-control" name="user_id"
                                        value="<?php echo $data_album->user_id ?>">
                                </div>
                                


                                <div class="form-group">
                                    <button type="submit" class="btn btn-light px-5"> Simpan</button>
                                    <button type="button"  href="<?= base_url('album')?>" class="btn btn-light px-5">
                                        kembali</button>
                                </div>
                                <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <!--End Dashboard Content-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <!-- <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer> -->
        <!--End footer-->

        <!--start color switcher-->
        <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher-->

    </div><!--End wrapper-->



</body>

</html>