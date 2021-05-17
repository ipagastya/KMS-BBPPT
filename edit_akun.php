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
              <h1 class="page-title"> <i class="sidebar-item-icon fa fa-users";></i> Edit Akun Pengguna</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > Pegawai > <a href="edit_akun.php" style="color: #0c2496;">Edit Pengguna</a> </li>
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
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Pengguna</div>
                                <div class="ibox-tools">
                                    <div class="dropdown-menu dropdown-menu-right">
                                       
                                      

                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                <?php

require_once 'koneksi.php';

// cek id
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // ambil data berdasarkan id_produk
     $q = $koneksi->query("SELECT * FROM akun WHERE id = '$id'");

   while ($dt = $q->fetch_assoc()) :
  ?>
                <form method="post" action="update_akun.php">
                    <input type="hidden" name="id" value="<?php echo $dt['id'] ?>">
      <table class="table table-bordered">
            <thead>
              <tr>
                <th>Username</th>
                <td><input type="text" class="form-control" name="username" value="<?php echo $dt['username'] ?>"></td>
              </tr>
              <tr>
                <th>Password</th>
                <td><input type="password" class="form-control" name="password"></td>
              </tr>
              <tr>
                <th>Nama</th>
                <td><input type="text" class="form-control" name="nama" value="<?php echo $dt['nama'] ?>"></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><input type="text" class="form-control" name="email" value="<?php echo $dt['email'] ?>"></td>
              </tr>
              <tr>
                <th>NIP</th>
                <td><input type="text" class="form-control" name="nip" value="<?php echo $dt['nip'] ?>"></td>
              </tr>
              <tr>
                <th>Role</th>
                <td>
                  <select class="form-control" name="level">

                  <option value="Admin"
                    <?php
                    $local= $dt['level'];
                    if($local=='Admin'){ ?>
                      selected
                    <?php } ?>>
                    Admin
                  </option>

                   <option value="Pegawai"
                   <?php
                    $local= $dt['level'];
                    if($local=='Pegawai'){ ?>
                      selected
                    <?php } ?>>
                    Pegawai
                  </option>
                  </select>

       </td>
              </tr>
              <tr>
                <th>Divisi</th>
                <td><select class="form-control" name="iddivisi">
                    <?php
                    require_once 'koneksi.php';
                      // ambil data berdasarkan id_produk
                     $qt = $koneksi->query("SELECT * FROM divisi");

                              $no = 1; // nomor urut
                              while ($row = $qt->fetch_assoc()) :
                      ?>
                  <option value="<?php echo $row['namadivisi']; ?>" 
                    <?php  
                    $local=$row['namadivisi']; 
                    $iddivisi=$dt['iddivisi'];   
                    if($local==$iddivisi){ ?>
                      selected
                    <?php } ?>>
                    <?php echo $row['namadivisi']; ?>
                    </option>
                     <?php
                    endwhile;
                    ?>
                </select> </td>
              </tr>
              <tr>
                <td></td>
                <td>
                      <input type="submit" name="submit"  class="btn btn-primary" value="Simpan">
                      <a class="btn btn-danger" href="reset_password.php" role="button">Reset Password</a>
                </td>
              </tr>
            </thead>
          </table>
       </form>   
 <?php
   endwhile;
}
?>

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