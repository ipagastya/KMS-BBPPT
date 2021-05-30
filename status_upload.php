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
                <h1 class="page-title"> <i class="sidebar-item-icon fa fa-newspaper-o";></i> Status Upload Knowledge</h1>
                <ol class="breadcrumb">
                    
                      <li class="breadcrumb-item">Beranda > Knowledge > <a href="status_upload.php" style="color: #0c2496;">Status Upload KNowledge</a> </li>
                   
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
        
      </div>
    </div>

                <br><br>

                 <div class="ibox ibox-primary">
                            <div class="ibox-head" style="background-color: #466B97;">
                                <div class="ibox-title">Status Upload Knowledge</div>
                                <div class="ibox-tools">
                                <div class="col-sm-6">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="status" value="all" checked="checked"> All
                                        </label>
                                        <label class="btn btn-success">
                                            <input type="radio" name="status" value="Disetujui"> Disetujui
                                        </label>
                                        <label class="btn btn-info ">
                                            <input type="radio" name="status" value="Menunggu Validasi" > Menunggu Validasi
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="status" value="Revisi"> Revisi
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="status" value="Ditolak"> Ditolak
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
                <th>Author</th>
                <th>Kategori</th>
                <th>Perangkat</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                 <?php
                // Tampilkan semua data
                
        
                $username = $_SESSION['username'];

                $q = $koneksi->query("SELECT * FROM informasi where author='$username'");

                $numb = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>
                    <?php if ($dt['status_approval'] == 'Disetujui'){ ?>
                        <tr data-status="Disetujui" >
                    <?php }else if ($dt['status_approval'] == 'Pending'){ ?>
                        <tr data-status="Menunggu Validasi">
                    <?php }else if ($dt['status_approval'] == 'Revisi'){ ?>
                        <tr data-status="Revisi">
                    <?php }else if ($dt['status_approval'] == 'Ditolak'){?>
                        <tr data-status="Ditolak">
                    <?php }else{ ?>
                    <tr>  
                    <?php }?>
                    <td><?php echo $numb++ ;?></td>
                    <td><a href="detailinformasi.php?id=<?php echo $dt['id'] ?>"><?php echo $dt['judul'] ?></a></td>
                    <!-- <td><?php echo $dt['judul'] ?></td> -->
                    <td><?php echo $dt['nomordokumen'] ?></td>
                    <td>
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
                    <!-- <a href="detailinformasi.php?id=<?php echo $dt['id'] ?>"><button type="button" class="btn btn-primary">Detail</button></a></td> -->
                    <td><?php $tanggal= $dt['tanggal']; echo date('d F Y', strtotime($tanggal)); ?></td>
                    <td><?php echo $dt['author'] ?></td>
                    <td>
                        
                        <?php
                        
                        // ambil data berdasarkan id_produk
                        $iddivisi = $dt['iddivisi'];
                        $q1 = $koneksi->query("SELECT * FROM divisi WHERE iddivisi='$iddivisi'");
                        while ($row1 = $q1->fetch_assoc()) :
                            echo $row1['namadivisi']; 
                        endwhile;
                        ?>

                        </td>

                    <td>
                        <?php
                        
                        // ambil data berdasarkan id_produk
                        $idperangkat = $dt['idperangkat'];
                        $q2 = $koneksi->query("SELECT * FROM perangkat WHERE idperangkat='$idperangkat'");
                        while ($row = $q2->fetch_assoc()) :
                            echo $row['namaperangkat']; 
                        endwhile;
                        ?>
                    </td>
                    <td><b>Validator : <?php echo $dt['officer'] ?></b><br>Tanggal Validasi : <?php $tanggal= $dt['tanggal_verif']; echo date('d F Y', strtotime($tanggal));?>
                    <br>
                        <?php if ($dt['status_approval'] == 'Disetujui'){ ?>
                            <span class="label label-success">Disetujui</span>
                        <?php }else if ($dt['status_approval'] == 'Pending'){ ?>
                            <span class="label label-info">Menunggu Validasi</span>
                        <?php }else if ($dt['status_approval'] == 'Revisi'){ ?>
                            <span class="label label-warning">Revisi</span>
                        <?php }else if ($dt['status_approval'] == 'Ditolak'){?>
                            <span class="label label-danger">Ditolak</span>
                        <?php }?>
                    <br>
                        Feedback :<?php echo $dt['feedback'] ?>
                    </td>
                    <td>
                        <a href="edit_informasi.php?id=<?php echo $dt['id']; ?>"><button type="button" class="btn btn-warning">Edit</button></a> 

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