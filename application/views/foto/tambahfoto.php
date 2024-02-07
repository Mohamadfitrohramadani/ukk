<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <!-- loader-->

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">
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
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle"
                                    alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
                                            <p class="user-subtitle">mccoy@example.com</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->
        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Tambah User</div>
                                <hr>
                                <?php echo form_open_multipart('foto/Inputfoto', 'class="foto-form"'); ?>
                                <div class="form-group ">
                                    <label for="input-1">Judul Foto</label>
                                    <input type="text" name="judul_foto" class="form-control" id="input-1"
                                        placeholder="Enter Your Judul">
                                </div>
                                <div class="form-group">
                                    <label for="input-2">Deskripsi</label>
                                    <input type="text" name="des_foto" class="form-control" id="input-2"
                                        placeholder="Enter Your Deskripsi">
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Tanggal Unggah</label>
                                    <input type="date" name="tgl_unggah" class="form-control" id="input-3">
                                </div>
                                <div class="form-group">
                                    <label for="input-4">Foto</label>
                                    <input type="file" name="lokasi_file" class="form-control" id="input-4"
                                        placeholder="Enter Your Nama Lengkap">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="input-5">Album Id</label>
                                    <input type="text" name="album_id" class="form-control" id="input-5"
                                        placeholder="Enter Your Alamat">
                                </div> -->
                                <div class="form-group">
                                    <label>Album Id</label>
                                    <select class="form-control" name="album_id" required>
                                        <option value="">Pilih Album</option>
                                        <?php foreach ($data_album as $album) { ?>
                                            <option value="<?= $album->album_id; ?>">
                                                <?= $album->nama_album; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                        <label for="input-5">User Id</label>
                                        <input type="text" name="user_id" class="form-control" id="input-5"
                                            placeholder="Enter Your Alamat">
                                    </div> -->
                                <div class="form-group">
                                    <label>User Id</label>
                                    <select class="form-control" name="user_id" required>
                                        <option value="">Pilih User</option>
                                        <?php foreach ($data_user as $user) { ?>
                                            <option value="<?= $user->user_id; ?>">
                                                <?= $user->username; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
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
            <footer class="footer">
                <div class="container">
                    <div class="text-center">
                        Copyright © 2018 Dashtreme Admin
                    </div>
                </div>
            </footer>
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


        <!-- Bootstrap core JavaScript-->


</body>

</html>