<?php 
  session_start();
  if($_SESSION['status']!="login"){
      header("location:login.php?pesan=belum_login");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>KMS-BBPPT</title>
    
<?php include "csssidebar.php"?>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <?php include "headeradmin.php" ?>
        <!-- END HEADER-->
      <?php include "sidebaradmin.php" ?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
              <h1 class="page-title"> <i class="sidebar-item-icon fa fa-newspaper-o";></i> Detail Informasi</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Beranda > Informasi > <a href=# style="color: #0c2496;">Detail Informasi</a> </li>
                </ol>
                <div class="box">
                    <div class="container">
                      <!--<form>
                        <i class="sidebar-item-icon fa fa-search"></i>
                        <input class="navbar-search" type="text" placeholder="Cari Judul Informasi" required> 
                        <button class="btn btn-lg" type="submit" style="margin-right: 100px; background-color: #13CEF8;width: 100px; ">Search</button>     
                        </form>-->
                        
                    </div>
                </div>
               
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                 
                <div class="container"> 

                <br><br>
                 
                            <div class="ibox-body">
                            
                <!--<div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default btn-lg">
                        <span id="search_concept"><i class="fa fa-search"></i></span>
                    </button>
                   
                </div> -->     
               <!-- <input type="text" class="form-control form-control-lg form-control-borderless" name="x" placeholder="Cari Judul Informasi">
                <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="button">Search</button>
                </span>-->
             


                </div>
            
                <?php
                // Tampilkan semua data
                include"koneksi.php";
                if (isset($_GET['id'])) {
                $id = $_GET['id'];


                $q = $koneksi->query("select informasi.id,informasi.nomordokumen,informasi.judul,informasi.dokumen,informasi.keterangan,informasi.tanggal,informasi.restricted,informasi.iddivisi
                from informasi
                INNER JOIN divisi ON divisi.iddivisi = informasi.iddivisi
                 where informasi.id='$id' limit 1");
                                   
                $no = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                  $idinfo         = $dt['id'];
                  $username      = $_SESSION['username'];
                  $data = $koneksi->query("SELECT * FROM favorit WHERE idinformasi='$idinfo' and  username='$username'");
                  $cek = mysqli_num_rows($data);
                  if($cek > 0){
                     $q2 = $koneksi->query("SELECT * FROM favorit WHERE judul='$idinfo' and  username='$username'");
                     while ($dt2 =  $q2->fetch_assoc()) {
                     $cek1=$dt2['id'];  
                     if($cek1){
                  ?>
                        <a href="hapus_favorit.php?id=<?php echo $dt2['id']; ?>" onclick="return confirm('Anda yakin akan menghapus favorit?')" style="float: right;">
                            <i class="sidebar-item-icon fa fa-star fa-3x" style="color: #e6c34a";></i>
                        </a>
                  <?php
                      }
                    }
                  }else{
                  ?>
                     <a href="save_favorit.php?id=<?php echo $dt['id']; ?>&judul=<?php echo $dt['judul']; ?>" onclick="return confirm('Berhasil Favorit')" style="float: right;">
                        <i class="sidebar-item-icon fa fa-star-o fa-3x" style="color: #000";></i>
                    </a>
                  <?php
                  }
                  ?>

                <h1><?php echo $dt['judul'] ?></h1>

                <br>
                <b> Kategori : </b> <?php echo $dt['namadivisi'] ?>  <br>
                <b> Penulis  : </b> <?php echo $dt['username'] ?> <br>
                <b> Tanggal  : </b> <?php echo date('d F Y', strtotime($tanggal)); ?> <br>
                <br>
                <br>
                <br>

                <?php echo $dt['keterangan'] ?> 
                <br>
                <table class="table">
            <thead>
              <tr>
                <td>Dokumen Lampiran</td>
                <td><a href="src/image/<?php echo $dt['dokumen'] ?>"><button type="button" class="btn btn-danger">File</button></a></td>
              </tr>
            </thead>
            </table>
                
                
             
             <?php
              endwhile;
            }
              ?> 

            </tbody>
          </table>


                
                </div>
            </div>
           <?php include "footeradmin.php" ?>
        </div>
    </div>
  
    <!-- END THEME CONFIG PANEL-->
    <?php include "cssbawah.php" ?>
</body>

</html>