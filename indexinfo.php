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
                                <h1 style="text-align: center;">Daftar Informasi</h1><br><br>
                                <div class="ibox-tools">
                                    <form>
                <div class="dropdown">
              <label for="firstName" class="first-name">Filter Kategori &nbsp;</label>
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" > Pilih Kategori
              <span class="caret"></span></button></form>
              <ul class="dropdown-menu">
                                
                                    <?php
                                        // Tampilkan semua data
                                        include"koneksi.php";

                                        $q = $koneksi->query("SELECT * FROM divisi");

                                        $nom = 1; // nomor urut
                                        while ($dt = $q->fetch_assoc()) :
                                        ?>
                                  
                                  <li><a href="indexinfo.php?iddivisi=<?php echo $dt['iddivisi'] ?>"><?php echo $dt['namadivisi'] ?></a></li>
                                 <?php
                                endwhile;
                                ?> 
                                
         </ul>
      </div>
    </div><br><br><br>


                   <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="font-size: 18pt;text-align: center;">No</th>
                <th style="font-size: 18pt;text-align: center;">Judul</th>
                <th style="font-size: 18pt;text-align: center;">Dokumen</th>
                <th style="font-size: 18pt;text-align: center;">Tanggal</th>
                <th style="font-size: 18pt;text-align: center;">Kategori</th>
            
              </tr>
            </thead>
            <tbody>
                <?php
                // Tampilkan semua data
                include"koneksi.php";


                 $iddivisi=$_GET['iddivisi'];
                if(!empty($iddivisi)){
                    $q = $koneksi->query("SELECT * FROM informasi where iddivisi='$iddivisi'");
                }else{
                    $q = $koneksi->query("SELECT * FROM informasi");
                }

                $noo = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>

                <tr>  
                <td style="font-size: 14pt; text-align: center;"><?php echo $noo++ ?></td>
                <td style="font-size: 14pt;"><?php echo $dt['judul'] ?></td>
                <td style="font-size: 14pt;">
                    <?php
                     $dokumen=$dt['dokumen'];
                    if(!empty($dokumen)){
                    ?>
                    <a href="src/image/<?php echo $dt['dokumen'] ?>"><button type="button" class="btn btn-danger">File</button></a> 
                    <?php
                    }else{
                    ?>
                    <button type="button" class="btn btn-danger">File Kosong</button>
                    <?php
                    }
                    ?>
                    |

                <a href="artikellengkap.php?id=<?php echo $dt['id'] ?>"><button type="button" class="btn btn-primary">Detail</button></a></td>
                </td>
                <td style="font-size: 14pt;"><?php echo $dt['tanggal'] ?></td>
                <td style="font-size: 14pt;">
                    
                    <?php
                    require_once 'koneksi.php';
                      // ambil data berdasarkan id_produk
                     $iddivisi = $dt['iddivisi'];
                     $q1 = $koneksi->query("SELECT * FROM divisi WHERE iddivisi='$iddivisi'");

                              $no = 1; // nomor urut
                              while ($row = $q1->fetch_assoc()) :
                      ?>
                    <?php echo $row['namadivisi']; ?>
                     <?php
                    endwhile;
                  ?>

                    </td>
                 

               
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
     <script src="libs/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="libs/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="libs/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer1.php' ?>