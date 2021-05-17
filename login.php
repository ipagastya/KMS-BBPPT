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
  <?php include "header1.php" ?>
 
     

    <div class="container">
      <div class="col-sm-4">
      </div>  
      <div class="col-sm-3" style="margin-top:100px; width:380px;">
        <h2 class="form-signin-heading" style="text-align:center;">Masuk KMS BBPPT</h2>
          <div class="panel panel-default" style="background-color: #ADD4F0;">
            
            <div class="panel-body">


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

              <form class="form-signin" method="POST" action="action.php">
               <br><br><br><br>
                <label for="username" class="sr-only">Username</label>
                <center><input type="text" name="username" id="username" class="form-control" placeholder="Username" style="width:250px; height:40px" required><br></center>
                <label for="password" class="sr-only">Password</label>
                <center><input type="password" name="password" id="password" class="form-control" placeholder="Password" style="width:250px; height:40px;" required><br></center>
                <center><button class="btn btn-lg btn-info" type="submit" style="margin-top: 100px; background-color: #466B97;width: 100px; ">Login</button></center>
              </form>


       </div>
          </div>

    </div> <!-- /container -->



</body>
</html>
