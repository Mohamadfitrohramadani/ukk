<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Login</title>
  <!-- loader-->
  <link href="<?= base_url()?>template/assets/css/pace.min.css" rel="stylesheet"/>
  <script src="<?= base_url()?>template/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="<?= base_url()?>template/assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="<?= base_url()?>template/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?= base_url()?>template/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?= base_url()?>template/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="<?= base_url()?>template/assets/css/app-style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">


	
 <div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="<?= base_url()?>template/assets/images/logo-icon.png" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Register</div>
		    <form action="<?= base_url() ?>register/Inputuser" method="POST">
			  <div class="form-group">
			  <label for="username" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="username" name="username" class="form-control input-shadow" placeholder="Enter Your Username">
				  <div class="form-control-position">
                  <i class="bi bi-person-badge-fill"></i>
				  </div>
			   </div>
			  </div>
              <div class="form-group">
			  <label for="password" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Enter Your Password">
				  <div class="form-control-position">
                  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
              <div class="form-group">
			  <label for="email" class="sr-only">Email ID</label>
			   <div class="position-relative has-icon-right">
				  <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Enter Your Email ID">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
              <!-- <div class="form-group">
			  <label for="namalengkap" class="sr-only">Nama Lengkap</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="namalengkap" name="namalengkap" class="form-control input-shadow" placeholder="Enter Your Nama Lengkap">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <label for="alamat" class="sr-only">Alamat</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="alamat" name="alamat" class="form-control input-shadow" placeholder="Choose Alamat">
				  <div class="form-control-position">
                  <i class="bi bi-geo-alt-fill"></i>
				  </div>
			   </div>
			  </div> -->
			  
			   <div class="form-group">
			     <div class="icheck-material-white">
                   <input type="checkbox" id="user-checkbox" checked="" />
                   <label for="user-checkbox">I Agree With Terms & Conditions</label>
			     </div>
			    </div>
			  
			 <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
			
			 </form>
		   </div>
		  </div>
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Already have an account? <a href="login.html"> Sign In here</a></p>
		  </div>
	     </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
  
  <!--end color switcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url()?>template/assets/js/jquery.min.js"></script>
  <script src="<?= base_url()?>template/assets/js/popper.min.js"></script>
  <script src="<?= base_url()?>template/assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="<?= base_url()?>template/assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?= base_url()?>template/assets/js/app-script.js"></script>
  
</body>
</html>
