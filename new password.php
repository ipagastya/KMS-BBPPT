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
</head>
<body>
	<!-- navbar-->
    <header class="header" >
		<div role="navigation" class="navbar navbar-default"  style="background-color: #466B97; border-color: #466B97; border-radius: 0px;">
			<div class="container">
				<div class="navbar-header"><a href="index.php" class="navbar-brand"><img src="src/image/logobbppt1.png" style="width: 120px;height: 40px;"></a>
					<div class="navbar-buttons">
						<button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu</i></button>
					</div>
				</div>
				<div id="navigation" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
					</ul>
				</div>
			</div>
		</div>
    </header>
     

    <div class="container">
		<div class="col-sm-4">
		</div>  
		<div class="col-sm-3" style="margin-top:125px; width:380px;">
        
			<div class="panel panel-default" style="background-color: #ADD4F0;">
            
				<div class="panel-body">
					<h3 class="form-signin-heading" style="text-align:center">Reset Password</h3>

					<?php
					$code=$_GET['code'];
					?>
					<form class="form-signin"  method="POST" action="resetact.php?code=<?=$code?>"
						<br><br><br>
						<h5 style='padding-left:35px'>Password Baru: </h5>
						<label for="password" class="sr-only">Password Baru</label>
						<center><input type="password" name="password" id="password" class="form-control" placeholder="********" style="width:250px; height:40px; margin-bottom: 20px" required></center>
						<!--<h5 style='padding-left:35px'>Konfirmasi Password Baru: </h5>
						<label for="password" class="sr-only" style="margin-bottom: 100px">Ulangi Password Baru</label>
						<center><input type="password" name="renewpass" id="renewpass" class="form-control" placeholder="********" style="width:250px; height:40px; margin-bottom:20px" required></center>-->
						<center style="height:100px"><button class="btn btn-lg btn-info" type="submit" style="margin-top:50px;background-color: #466B97;width: 100px;">Reset</button</center>
						
					</form>


        
				</div>
			</div>
		</div>
		<!-- jQuery -->
		<script src="admin/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="admin/dist/js/adminlte.min.js"></script>
            
    </div>
</body>
</html>
