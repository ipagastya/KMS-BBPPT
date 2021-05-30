<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KMS BBPPT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS-->
    <link rel="stylesheet" href="libs/bootstrap/dist/css/bootstrap.min.css">
    <link href="libs/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="libs/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="libs/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="libs/css/style1.css" id="theme-stylesheet">

    <!--Logo web-->
    <link rel="shortcut icon" href="libs/image/icon2.png">

    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="libs/bootstrap/dist/js/jquery.cookie.js"> </script>
</head>
<body>
<!-- navbar-->
  <header class="header" >
        <div role="navigation" class="navbar navbar-default"  style="background-color: #466B97; border-color: #466B97; border-radius: 0px;">
          <div>
            <div class="navbar-header"><a href="index.php" class="navbar-brand"><img src="src/image/logokms.png" style="width: 200px; height: 41px;"></a>
              <div class="navbar-buttons">
                <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu</i></button>
              </div>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li ><a href="indexinfo.php">Informasi Pengujian</a></li>
                <li><a href="http://bbppt.postel.go.id/pengujian/">Portal Pengujian</a></li>
                <li class="active"><a href="faq_pemohon.php">FAQ</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
              <a href="login.php" class="btn navbar-btn btn-ghost" >Login</a>
              </ul>
            </div>
          </div>
        </div>
    </header>
</html>
	 <div class="page-content fade-in-up">
                <div class="container"> 
                <br><br>
                 <div class="ibox ibox-primary" style="border-color: #000;">
                            <div class="ibox-head" style="background-color: #fff;">
                                <h1 style="text-align: center;">FAQ</h1><br><br>
                                
                                <div class="ibox-tools">
                                   
                </div>
                </div><br><br><br>
                <?php
                    // Tampilkan semua data
                    include"koneksi.php";
                    $q = $koneksi->query("SELECT * FROM faq where isRestricted=0");
                    $numb = 1; // nomor urut
                    while ($dt = $q->fetch_assoc()) :
                        $numb++
                    ?>
                    
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="heading<?php echo $numb ;?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $numb ;?>" aria-expanded="true" aria-controls="collapse<?php echo $numb ;?>">
                                    <?php echo $dt['pertanyaan'] ?>
                                    </button>
                                </h5>
                                </div>

                                <div id="collapse<?php echo $numb ;?>" class="collapse" aria-labelledby="heading<?php echo $numb ;?>" data-parent="#accordion">
                                <div class="card-body">
                                    <?php echo $dt['jawaban'] ?>
                                </div>
                                </div>
                            </div>
                        </div>
                
                
                    <?php
                    endwhile;
                    ?> 




                </div>
            </div>
        </div>
    </div>
     <script src="libs/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="libs/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="libs/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer1.php' ?>