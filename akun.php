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
              <h1 class="page-title"> <i class="sidebar-item-icon fa fa-users";></i> Pegawai</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > Pegawai > <a href="akun.php" style="color: #0c2496;">Pengaturan Pengguna</a> </li>
                </ol>
                <div class="box">
                    <div class="container">
                      <!--<form>
                        <i class="sidebar-item-icon fa fa-search"></i>
                        <input class="navbar-search" type="text" placeholder="Cari Judul Informasi" required> 
                        <button class="btn btn-lg" type="submit" style="margin-right: 100px; background-color: #13CEF8;width: 100px; ">Search</button>     
                        </form>-->
                              <div class="page-heading">
                                
            </div>
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
                                <div class="ibox-title">Pengaturan Pengguna</div>
                                <div class="ibox-tools">
                               

                                     <!--<button type="button" class="btn btn-danger">Nonaktifkan</button>-->

                                     <a href="tambah_akun.php">
                                      <button type="button" class="btn btn-success">Tambah</button>
                                      </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       

                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">

            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">

            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Divisi</th>
                <th>Level</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

    
               <?php
                // Tampilkan semua data
                include"koneksi.php";

                $q = $koneksi->query("SELECT * FROM akun order by id asc");

                $no = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>
                <tr>   
                <td><?php echo $no++ ?></td>
                <td><?php echo $dt['nama'] ?></td>
                <td><?php echo $dt['email'] ?></td>
                <td><?php echo $dt['iddivisi'] ?></td>
                <td><?php echo $dt['level'] ?></td>
                <td><?php echo $dt['status'] ?></td>
                <td>
                    <a href="edit_akun.php?id=<?php echo $dt['id']; ?>"><i class="sidebar-item-icon fa fa-pencil "></i></a> &nbsp; &nbsp;

                    <?php
                     $status= $dt['status'];
                     if($status=='Aktif'){
                     ?>
                       <a href="aktivasi_akun.php?id=<?php echo $dt['id']; ?>&status=aktif" onclick="return confirm('Anda yakin akan menonaktifkan akun ini?')">
                        <i class="sidebar-item-icon fa fa-check-circle " style="color: #27d825";></i> &nbsp; &nbsp;
                    </a>
                     <?php }else{ ?>
                    <a href="aktivasi_akun.php?id=<?php echo $dt['id']; ?>&status=non" onclick="return confirm('Anda yakin akan mengaktifkan akun ini?')">
                        <i class="sidebar-item-icon fa fa-ban " style="color: #f21010";></i> &nbsp; &nbsp;
                    </a>
                    <?php 
                    }
                    ?>
                    

                    <a href="hapus_akun.php?id=<?php echo $dt['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                        <i class="sidebar-item-icon fa fa-trash"></i>
                    </a>
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