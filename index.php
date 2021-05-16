<?php include 'headeradmin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KMS BBPPT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS-->
    <link rel="stylesheet" href="libs/bootstrap/dist/css/bootstrap.min.css">

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
</html>
	<div class="container" style="width: 100%">
	<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 550px;">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">

	      <div class="item active">
	        <img src="src/image/KOMINFO1.png" alt="Los Angeles" style="width:100%; height: 550px;">
	        <!-- <div class="carousel-caption">
	          <h3>Los Angeles</h3>
	          <p>LA is always so much fun!</p>
	        </div> -->
	      </div>

	      <div class="item">
	        <img src="src/image/kominfo.jpg" alt="Chicago" style="width:100%; height: 550px;">
	        <!-- <div class="carousel-caption">
	          <h3>Chicago</h3>
	          <p>Thank you, Chicago!</p>
	        </div> -->
	      </div>
	    
	      <div class="item">
	        <img src="src/image/indo.jpg" alt="New York" style="width:100%; height: 550px;">
	        <!-- <div class="carousel-caption">
	          <h3>New York</h3>
	          <p>We love the Big Apple!</p>
	        </div> -->
	      </div>
	  
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      <span class="sr-only">Next</span>
	    </a>
	</div>
	</div>
	<div class="container" style="padding: 20px;">
		<div class="form-inline" style="display: flex;justify-content: center;">
			<div class="form-group" style="width: 600px;">
			<form action="indexcari.php" method="GET">	
			  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
			    aria-describedby="search-addon" style="width: 100%;" name="judul" />
			</div>
			<button type="button" class="btn btn-outline-primary" style="color: white;background-color: blue;"><i class="glyphicon glyphicon-search"></i></button>
		</div></form>
	</div>
	<div class="container" style="margin-bottom: 10px;padding: 10px;">
		<strong style="position: absolute;float: left; font-size: 14pt;">Informasi Terbaru</strong>
	</div>

	<div class="container" style="margin-bottom: 10px;margin-top: 10px; padding: 20px;">

		<?php
        // Tampilkan semua data
        include"koneksi.php";

        $q = $koneksi->query("SELECT * FROM informasi where restricted='Aktif'");

        $no = 1; // nomor urut
        while ($dt = $q->fetch_assoc()) :
        ?>
		
		
			<div class="col-lg-4" style="height:140px;">
					<h4><a href="artikellengkap.php?id=<?php echo $dt['id'] ?>"><?php echo $dt['judul'] ?></h4></a>
					<strong><?php $tanggal= $dt['tanggal']; echo date('d F Y', strtotime($tanggal)); ?></strong>
					<!--<?php $keterangan= $dt['keterangan']; echo substr($keterangan, 0 ,100); ?>-->
					<p style="text-align: justify;">
					<?php $keterangan= $dt['berita']; echo substr($keterangan, 0 ,100); ?></p>
			</div>
			

		<?php
        endwhile;
         ?>

		</div>

	
	</div>
<?php include 'footer1.php' ?>