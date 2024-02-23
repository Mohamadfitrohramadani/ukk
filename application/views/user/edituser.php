<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LuxeLens-Admin</title>
    <link rel="icon" href="<?= base_url('logo/6c.jpg') ?>" type="" style="widht: 200px; height: 200px;">
</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="index.html">
                <img src="<?= base_url() ?>logo/b.png" class="logo-icon" alt="logo icon">
                <h5 class="logo-text">Luxe Lens</h5>
            </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">NAVIGATION</li>
            <li class="<?= (current_url() == base_url('dashboard')) ? 'active' : ''; ?>">
                <a href="<?= base_url('dashboard') ?>">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?= (current_url() == base_url('album')) ? 'active' : ''; ?>">
                <a href="<?= base_url('album') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-images" viewBox="0 0 16 16">
                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                        <path
                            d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                    </svg>&nbsp;&nbsp;
                    <span>Album</span>
                </a>
            </li>

            <li class="<?= (current_url() == base_url('foto')) ? 'active' : ''; ?>">
                <a href="<?= base_url('foto') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                        <path
                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                    </svg>&nbsp;&nbsp;
                    <span>Foto</span>
                </a>
            </li>

            <li class="<?= (current_url() == base_url('komentar')) ? 'active' : ''; ?>">
                <a href="<?= base_url('komentar') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1m0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1m0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1" />
                    </svg>&nbsp;&nbsp;
                    <span>Komen</span>
                </a>
            </li>

            <li class="<?= (current_url() == base_url('like')) ? 'active' : ''; ?>">
                <a href="<?= base_url('like') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                    </svg>&nbsp;&nbsp;
                    <span>Like</span>
                </a>
            </li>

            <li class="<?= (current_url() == base_url('user')) ? 'active' : ''; ?>">
                <a href="<?= base_url('user') ?>">
                    <i class="zmdi zmdi-account-box"></i> <span>User</span>

                </a>
            </li>
            <li class="">
                <a href="<?= base_url('login/logout') ?>">
                    <i class="zmdi zmdi-arrow-right"></i> <span>Log Out</span>

                </a>
            </li>

        </ul>

    </div>
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

                <!-- <ul class="navbar-nav align-items-center right-nav-link">
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

                </ul> -->
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
        <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Update User</div>
                            <hr>
                            <?php echo form_open_multipart('user/update/' . $data_user->user_id, 'class="user-form"'); ?>
                            <div class="form-group">
                                <label for="foto_user">Ganti Gambar</label>
                                <input type="file" class="form-control" id="foto_user" name="foto_user">
                                <small>Gambar Saat ini: <img src="<?= base_url('assets/user/' . $data_user->foto_user); ?>"
                                        alt="Preview" width="100"></small>
                            </div>
                                <div class="form-group ">
                                    <label for="input-1">User Id</label>
                                    <input type="text" class="form-control" value="<?php echo $data_user->user_id ?>"
                                        disabled>
                                    <input type="hidden" name="user_id" value="<?php echo $data_user->user_id ?>">
                                </div>
                                <div class="form-group ">
                                    <label for="input-1">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="<?php echo $data_user->username ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-2">password</label>
                                    <input type="text" class="form-control" name="password"
                                        value="<?php echo $data_user->password ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="<?php echo $data_user->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-4">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="namalengkap"
                                        value="<?php echo $data_user->namalengkap ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-5">Alamat</label>
                                    <input type="text" class="form-control" name="alamat"
                                        value="<?php echo $data_user->alamat ?>">
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