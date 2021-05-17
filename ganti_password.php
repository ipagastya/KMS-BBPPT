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
	<title>Ganti Password</title>
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
                    <h1 class="page-title"> <i class="sidebar-item-icon fa fa-key";></i>Ganti Password</h1>
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item">Beranda > Akun > <a href="ganti_password.php" style="color: #0c2496;">Ganti Password</a> </li>
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
                        <div class="ibox-head">
                            <div class="ibox-title">Ganti Password</div>
                            <div class="ibox-tools">
                            <div class="dropdown-menu dropdown-menu-right"></div>
                        </div>
                    </div>
                    <div class="ibox-body">
                
                <?php
                //mengatasi error notice dan warning
                //error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                
                //koneksi ke database
                require_once 'koneksi.php';

                //proses jika tombol rubah di klik
                if($_POST['submit']){
                    //membuat variabel untuk menyimpan data inputan yang di isikan di form
                    $password_lama			= $_POST['password_lama'];
                    $password_baru			= $_POST['password_baru'];
                    $konfirmasi_password	= $_POST['konfirmasi_password'];
                    
                    //cek dahulu ke database dengan query SELECT
                    //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
                    //encrypt -> md5($password_lama)
                    $password_lama	= md5($password_lama);
                    $cek 			= $koneksi->query("SELECT password FROM akun WHERE password='$password_lama'");
                    
                    if($cek->num_rows){
                        //kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
                        //membuat kondisi minimal password adalah 5 karakter
                        if(strlen($password_baru) >= 6){
                            //jika password baru sudah 5 atau lebih, maka lanjut ke bawah
                            //membuat kondisi jika password baru harus sama dengan konfirmasi password
                            if($password_baru == $konfirmasi_password){
                                //jika semua kondisi sudah benar, maka melakukan update kedatabase
                                //query UPDATE SET password = encrypt md5 password_baru
                                //kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
                                $password_baru 	= md5($password_baru);
                                $email_user 		= $_SESSION['email'];//ini dari session saat login
                                
                                $update 		= $koneksi->query("UPDATE akun SET password='$password_baru' WHERE email='$email_user'");
                                if($update){
                                    //kondisi jika proses query UPDATE berhasil
                                    echo 'Password berhasil di rubah';
                                }else{
                                    //kondisi jika proses query gagal
                                    echo 'Gagal merubah password';
                                }					
                            }else{
                                //kondisi jika password baru beda dengan konfirmasi password
                                echo 'Konfirmasi password tidak cocok';
                            }
                        }else{
                            //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
                            echo 'Minimal password baru adalah 6 karakter';
                        }
                    }else{
                        //kondisi jika password lama tidak cocok dengan data yang ada di database
                        echo 'Password lama tidak cocok';
                    }
                }
                ?>
                
                <!-- mulai form rubah password -->
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>Password Lama</td>
                            <td>:</td>
                            <td><input type="password" name="password_lama" required></td>
                        <tr>
                        <tr>
                            <td>Password Baru</td>
                            <td>:</td>
                            <td><input type="password" name="password_baru" required></td>
                        <tr>
                        <tr>
                            <td>Konfirmasi Password</td>
                            <td>:</td>
                            <td><input type="password" name="konfirmasi_password" required></td>
                        <tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            <td><input type="submit" class="btn btn-green" name="submit" value="Rubah"></td>
                        <tr>
                    </table>
                </form>
            </div>
            </div>
            </div>
            </div>
            </div>    
            <?php include "footeradmin.php" ?>
            </div>
        <!-- selesai form rubah password -->
    </div>
<?php include "cssbawah.php" ?>
</body>
</html>