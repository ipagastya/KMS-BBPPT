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
                <h1 class="page-title"> <i class="sidebar-item-icon fa fa-tablet";></i> Perangkat</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > Perangkat > <a href="perangkat.php" style="color: #0c2496;">Pengaturan Perangkat</a> </li>
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
                 <div class="ibox ibox-primary">
                            <div class="ibox-head" style="background-color: #466B97;">
                                <div class="ibox-title">Pengaturan Perangkat</div>
                                <div class="ibox-tools">
                                        <?php 
                    $level = $_SESSION['level'];
                    if($level=='Admin'){
                    ?>
                <a href="tambah_perangkat.php">
                                      <button type="button" class="btn btn-success">Tambah</button>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right">
                                    </div>
                                </div>
                            </div>
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
             


              
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Perangkat</th>
                <th>Biaya</th>
                <th>Kategori</th>
                <th>Action</th>
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
                <td><?php echo $noo++ ?></td>
                <td><?php echo $dt['namaperangkat'] ?></td>
                <td><?php echo $dt['biaya'] ?></td>
                <td>
                    
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

                <td>
                    <a href="edit_perangkat.php?id=<?php echo $dt['idperangkat']; ?>"><button type="button" class="btn btn-warning">Edit</button></a> |
                    <a href="hapus_perangkat.php?id=<?php echo $dt['idperangkat']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><button type="button" class="btn btn-danger">Hapus</button></a>

                </td>
                </tr>
             
             <?php
              endwhile;
              ?> 

            </tbody>
          </table>

      <?php } ?>

                </div>
                </div>
            </div>
           <?php include "footeradmin.php" ?>
        </div>
    </div>
  
    <!-- END THEME CONFIG PANEL-->
    <?php include "cssbawah.php" ?>
</body>

</html>