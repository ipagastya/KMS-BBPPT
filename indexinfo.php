<?php include 'header1.php' ?>
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
	 <div class="page-content fade-in-up">
             
                 
                <div class="container"> 

                <br><br>
                 <div class="ibox ibox-primary" style="border-color: #000;">
                            <div class="ibox-head" style="background-color: #fff;">
                                <h1 style="text-align: center;">Daftar Perangkat</h1><br><br>
                                <div class="ibox-tools">
                                         <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="font-size: 18pt;text-align: center;">No</th>
                <th style="font-size: 18pt;text-align: center;">Nama Perangkat</th>
                <th style="font-size: 18pt;text-align: center;">Biaya</th>
              </tr>
            </thead>
            <tbody>
                <?php
                // Tampilkan semua data
                include"koneksi.php";

                $q = $koneksi->query("SELECT * FROM perangkat");

                $noo = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>

                <tr>  
                <td style="font-size: 14pt; text-align: center;"><?php echo $noo++ ?></td>
                <td style="font-size: 14pt;"><?php echo $dt['namaperangkat'] ?></td>
                <td style="font-size: 14pt;"><?php echo $dt['biaya'] ?></td>
            

               
                </tr>
             
             <?php
              endwhile;
              ?> 

            </tbody>
          </table>


                </div>
            </div>
        </div>
    </div>
 
</body>

</html><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer1.php' ?>