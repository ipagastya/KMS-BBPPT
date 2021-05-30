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
    
<?php include "csssidebar.php";
include "koneksi.php";?>
</head>
<script>
$(document).ready(function(){
	$(".btn-group .btn").click(function(){
		var inputValue = $(this).find("input").val();
		if(inputValue != 'all'){
			var target = $('table tr[data-status="' + inputValue + '"]');
			$("table tbody tr").not(target).hide();
			target.fadeIn();
		} else {
			$("table tbody tr").fadeIn();
		}
	});
	// Changing the class of status label to support Bootstrap 4
    var bs = $.fn.tooltip.Constructor.VERSION;
    var str = bs.split(".");
    if(str[0] == 4){
        $(".label").each(function(){
        	var classStr = $(this).attr("class");
            var newClassStr = classStr.replace(/label/g, "badge");
            $(this).removeAttr("class").addClass(newClassStr);
        });
    }
});
</script>

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
                <h1 class="page-title"> <i class="sidebar-item-icon fa  fa-file";></i> Dokumen</h1>
                <ol class="breadcrumb">
                   
                      <li class="breadcrumb-item">Beranda > Knowledge > <a href="dokumen.php" style="color: #0c2496;">Dokumen</a> </li>
                    
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
                <!--<div class="row">
                 
               <div class="container">-->
                <form>
                <div class="dropdown">
        <label for="firstName" class="first-name">Filter Kategori &nbsp;</label>
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" > Pilih Kategori
          <span class="caret"></span>
        </button></form>
              <ul class="dropdown-menu">
                                
                                    <?php
                                        // Tampilkan semua data
                                        
                    $searchkey1= $_POST['searchkey'];
                    $iddivisi=$_GET['iddivisi'];
                    $searchkey=$_GET['searchkey'];
                    if(!empty($searchkey1)){
                      $searchkey=$searchkey1;
                    }else{
                      if(!empty($searchkey)){
                        $searchkey= $searchkey;
                      }
                    }

                                        $q = $koneksi->query("SELECT * FROM divisi");

                                        $nom = 1; // nomor urut
                                        while ($dt = $q->fetch_assoc()) :
                                        ?>
                                  
                                  <li><a href="informasi.php?iddivisi=<?php echo $dt['iddivisi']; ?>&searchkey=<?php echo $searchkey1;?>"><?php echo $dt['namadivisi'] ?></a></li>
                                 <?php
                                endwhile;
                                ?> 
                                
         </ul>
      </div>
    </div>

                <br><br>
                <a href="tambah_dokumen.php">
                                        <button type="button" class="btn btn-success">Tambah</button>
                                </a>
                 <div class="ibox ibox-primary">
                            <div class="ibox-head" style="background-color: #466B97;">
                                <div class="ibox-title">Dokumen</div>
                                <div class="ibox-tools">
                                <div class="col-sm-6">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="status" value="all" checked="checked"> All
                                        </label>
                                        <label class="btn btn-success">
                                            <input type="radio" name="status" value="Teks"> Teks
                                        </label>
                                        <label class="btn btn-info ">
                                            <input type="radio" name="status" value="Gambar" > Gambar
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="status" value="Video"> Video
                                        </label>
        						
                                    </div>
                                    
                                </div>
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
                <th>Judul</th>
                <th>Nomor Dokumen</th>
                <th>Dokumen</th>
                <th>Revisi</th>
                <th>Jenis Dokumen</th>
                <th>Kategori</th>
                <th>Perangkat</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                 <?php
                // Tampilkan semua data
                
        
        
        if(!empty($searchkey)){
          
          if(!empty($iddivisi)){
                    $q = $koneksi->query("SELECT * FROM informasi where iddivisi='$iddivisi' and status_approval='Disetujui' and judul like '%$searchkey%'");
          }else{
            $q = $koneksi->query("SELECT * FROM informasi where status_approval='Disetujui' and judul like '%$searchkey%'");
          }
        }else{
          if(!empty($iddivisi)){
            // error_reporting(E_ALL ^ E_NOTICE);
            // session_start();
            // $username = $_SESSION['username'];
            // $level = $_SESSION['level'];
            // if($level=='Officer'){
            // $q = $koneksi->query("SELECT * FROM informasi");
            // } else {
            //   $q = $koneksi->query("SELECT * FROM informasi where iddivisi='$iddivisi' and level='Admin' and author='$username'");
            // }
            $q = $koneksi->query("SELECT * FROM informasi where status_approval='Disetujui' and isDokumen = 1 and iddivisi='$iddivisi' and dokumen IS NOT NULL");


          }else{
            // $username = $_SESSION['username'];
            // $level = $_SESSION['level'];
            // if($level=='Officer'){
            //   $q = $koneksi->query("SELECT * FROM informasi");
            // } else {
            //   $q = $koneksi->query("SELECT * FROM informasi where level='Admin' and author='$username'");
            // }
            $q = $koneksi->query("SELECT * FROM informasi where status_approval='Disetujui' and isDokumen = 1 and dokumen IS NOT NULL");

          }
          
        }
          
/*
               $iddivisi=$_GET['iddivisi'];
         
                if(!empty($iddivisi)){
                    $q = $koneksi->query("SELECT * FROM informasi where iddivisi='$iddivisi'");
                }else{
                    $q = $koneksi->query("SELECT * FROM informasi");
                }*/

                $numb = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>

                <?php if ($dt['jenisDokumen'] == 'Teks'){ ?>
                    <tr data-status="Teks" >
                <?php }else if ($dt['jenisDokumen'] == 'Gambar'){ ?>
                    <tr data-status="Gambar">
                <?php }else if ($dt['jenisDokumen'] == 'Video'){ ?>
                    <tr data-status="Video">
                <?php }else{ ?>
                    <tr> 
                <?php }?>
                <td><?php echo $nom++ ;?></td>
                <td><a href="src/image/<?php echo $dt['dokumen'] ?>"><?php echo $dt['judul'] ?></a></td>
                <!-- <td><?php echo $dt['judul'] ?></td> -->
                <td><?php echo $dt['nomordokumen'] ?></td>
                <td><a href="src/image/<?php echo $dt['dokumen'] ?>"><button type="button" class="btn btn-danger">File</button></a> </td>
                <td><b>Author : <?php echo $dt['author'] ?></b><br>Tanggal Update : <?php $tanggal= $dt['tanggal']; echo date('d F Y', strtotime($tanggal)); ?></td>
                <td><?php echo $dt['jenisDokumen'] ?></td>
                <td>
                    
                    <?php
                    
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
                    <?php
                    
                      // ambil data berdasarkan id_produk
                     $idperangkat = $dt['idperangkat'];
                     $q1 = $koneksi->query("SELECT * FROM perangkat WHERE idperangkat='$idperangkat'");

                              $no = 1; // nomor urut
                              while ($row = $q1->fetch_assoc()) :
                      ?>
                     <?php echo $row['namaperangkat']; ?>
                     <?php
                    endwhile;
                  ?>
                </td>
                <td><b>Validator : <?php echo $dt['officer'] ?></b><br>Tanggal Validasi : <?php $tanggal= $dt['tanggal_verif']; echo date('d F Y', strtotime($tanggal)); ?></td>
                <td>
                    <a href="edit_dokumen.php?id=<?php echo $dt['id']; ?>"><button type="button" class="btn btn-warning">Edit</button></a> 

                    <?php 
                    $level = $_SESSION['level'];
                    if($level=='Officer'){
                    ?>
                    
                      | <a href="hapus_informasi.php?id=<?php echo $dt['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><button type="button" class="btn btn-danger">Hapus</button></a>

                     <?php
                    }else if ($level=='Admin'){
                     $status= $dt['restricted'];
                     if($status=='Aktif'){
                     ?>
                       <a href="aktivasi_informasi.php?id=<?php echo $dt['id']; ?>&status=aktif" onclick="return confirm('Anda yakin akan mengubah dokumen ini menjadi privat?')">
                       <i class="sidebar-item-icon fa fa-eye-slash fa-2x" style="color: #000";></i> &nbsp; &nbsp;
                    </a>
                     <?php }else{ ?>
                        <a href="aktivasi_informasi.php?id=<?php echo $dt['id']; ?>&status=non" onclick="return confirm('Anda yakin akan mengubah dokumen ini menjadi publik?')">
                        <i class="sidebar-item-icon fa fa-eye fa-2x" style="color: #000";></i> &nbsp; &nbsp;
                    </a>
                    <?php 
                      }
                    }
                    ?>

                </td>
                </tr>
             
             <?php
              endwhile;
              ?> 

            </tbody>
          </table>



                  <!--</div>-->
                </div>
            </div>
           <?php include "footeradmin.php" ?>
        </div>
    </div>
 
    <!-- END THEME CONFIG PANEL-->
    <?php include "cssbawah.php" ?>
</body>
</html>