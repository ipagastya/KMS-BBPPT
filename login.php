<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMS BBPPT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">

  <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="libs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
    <link rel="stylesheet" href="libs/bootstrap/dist/css/font-awesome.min.css">

    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">

    <!-- lightbox-->
    <link rel="stylesheet" href="libs/bootstrap/dist/css/lightbox.min.css">

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="libs/css/style1.css" id="theme-stylesheet">

    <!--Logo web-->
    <link rel="shortcut icon" href="src/image/icon2.png">

    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="libs/bootstrap/dist/js/jquery.cookie.js"> </script>
    <script src="libs/bootstrap/dist/js/lightbox.min.js"></script>
    <script src="libs/bootstrap/dist/js/front.js"></script>
    <style>
      body {
        background-image: url('src/image/indo.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
      }
    </style>
    <?php include "header1.php"?>
</head>
<body>
    <div class="container">
      <div class="col-sm-4">
      </div>  
      <div class="col-sm-3" style="margin-top:100px; width:380px;">
        
          <div class="panel panel-default" style="background-color: #ADD4F0;">
            
            <div class="panel-body">
				<h2 class="form-signin-heading" style="text-align:center">Masuk KMS BBPPT</h2>
	

              <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='alert alert-danger' role='alert'>Login gagal! username dan password salah!</div>";
            }
            else if($_GET['pesan'] == "logout"){
                echo "<div class='alert alert-danger' role='alert'>Anda telah berhasil logout</div>";
            }
            else if($_GET['pesan'] == "belum_login"){
                echo "<div class='alert alert-danger' role='alert'>Anda harus login untuk mengakses halaman admin</div>";
            }
        }
    ?>

              <form class="form-signin"  method="POST" action="action.php">
               <br><br><br>
                <label for="username" class="sr-only">Username</label>
                <center><input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off" style="width:250px; height:40px; margin-bottom: 20px" required></center>
                <label for="password" class="sr-only" style="margin-bottom: 100px">Password</label>
                <center><input type="password" name="password" id="password" class="form-control" placeholder="Password" style="width:250px; height:40px; margin-bottom:20px" required></center>
				<a href data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" ="#" style="margin-left:175px">Reset Password</a>
                <center style="height:100px"><button class="btn btn-lg btn-info" type="submit" style="margin-top: 50px; background-color: #466B97;width: 100px; ">Login</button></center>
              </form>


        
    </div>
	<div class="modal fade" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document" style="padding-top: 18%;padding-left:124px">
					<div class="modal-content" style="height:200px; width:350px;">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="exampleModalLabel">Reset Password</h4>
						
					  </div>
					  <div class="modal-body">
						<form action="email.php" method="POST">
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Masukkan Email Anda</label>
							<form action="email-script.php" method="post" class="form-signin">
							<input type="email" name="email" class="form-control" autocomplete="off">
						  </div>
						 
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="submit_email">Submit</button>
						  </div>
						</form>
					</div>
				  </div>
				</div>
    </div>
	
	
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
               
              </form>
          </div>
		  

    </div> <!-- /container -->




</body>
</html>
