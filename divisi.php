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
                <h1 class="page-title"> <i class="sidebar-item-icon fa fa-id-card-o";></i> Kategori</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > Kategori > <a href="divisi.php" style="color: #0c2496;">Pengaturan Kategori</a> </li>
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


                <div class="ibox ibox-primary">
                            <div class="ibox-head" style="background-color: #466B97;">
                                <div class="ibox-title">Pengaturan Kategori</div>
                                <div class="ibox-tools">
                                     <a href="tambah_divisi.php">
                                      <button type="button" class="btn btn-success">Tambah</button>
                                      </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       
                                      

                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">




                <table class="table table-bordered">
            <thead>
              <tr>
                <th style="text-align: center";>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
             
                <?php
                // Tampilkan semua data
                include"koneksi.php";

                $q = $koneksi->query("SELECT * FROM divisi");

                $no = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>
                <tr>
                  
                <td style="text-align: center";><?php echo $no++ ?></td>
                <td><?php echo $dt['namadivisi'] ?></td>
                <td>
                    <a href="edit_divisi.php?id=<?php echo $dt['iddivisi']; ?>"><i class="sidebar-item-icon fa fa-pencil "></i></a> &nbsp; &nbsp;
                    <a href="hapus_divisi.php?id=<?php echo $dt['iddivisi']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="sidebar-item-icon fa fa-trash-o"></i></a>
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
            </div>
           <?php include "footeradmin.php" ?>
        </div>
    </div>
   
    <!-- END THEME CONFIG PANEL-->
    <?php include "cssbawah.php" ?>
</body>

</html>