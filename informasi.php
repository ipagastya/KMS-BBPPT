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
                <h1 class="page-title"> <i class="sidebar-item-icon fa fa-newspaper-o";></i> Informasi</h1>
                <ol class="breadcrumb">
                    <?php 
                      $level = $_SESSION['level'];
                      if($level=='Admin'){
                    ?>
                      <li class="breadcrumb-item">Beranda > Informasi > <a href="informasi.php" style="color: #0c2496;">Pengaturan Informasi</a> </li>
                    <?php 
                      }else{
                    ?>
                      <li class="breadcrumb-item">Beranda > Informasi > <a href="informasi.php" style="color: #0c2496;">Daftar Informasi</a> </li>
                    <?php 
                      }
                    ?>
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
                    <?php 
                    $level = $_SESSION['level'];
                    if($level=='Admin'){
                    ?>

                 <div class="ibox ibox-primary">
                            <div class="ibox-head" style="background-color: #466B97;">
                                <div class="ibox-title">Pengaturan Informasi</div>
                                <div class="ibox-tools">
                   
                <a href="tambah_informasi.php">
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
                <th>Judul</th>
                <th>Nomor Dokumen</th>
                <th>Dokumen</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Perangkat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                 <?php
                // Tampilkan semua data
                
				
				
				if(!empty($searchkey)){
					
					if(!empty($iddivisi)){
                    $q = $koneksi->query("SELECT * FROM informasi where iddivisi='$iddivisi' and judul like '%$searchkey%'");
					}else{
						$q = $koneksi->query("SELECT * FROM informasi where judul like '%$searchkey%'");
					}
				}else{
					if(!empty($iddivisi)){
						
						
						
						$q = $koneksi->query("SELECT * FROM informasi where iddivisi='$iddivisi'");

					}else{
						$q = $koneksi->query("SELECT * FROM informasi");
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

                <tr>  
                <td><?php echo $nom++ ; echo $iddivisi;?></td>
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
                <td>
                    <a href="edit_informasi.php?id=<?php echo $dt['id']; ?>"><button type="button" class="btn btn-warning">Edit</button></a> | <a href="hapus_informasi.php?id=<?php echo $dt['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><button type="button" class="btn btn-danger">Hapus</button></a>

                     <?php
                     $status= $dt['restricted'];
                     if($status=='Aktif'){
                     ?>
                       <a href="aktivasi_informasi.php?id=<?php echo $dt['id']; ?>&status=aktif" onclick="return confirm('Anda yakin akan menonaktifkan artikel ini?')">
                       <i class="sidebar-item-icon fa fa-eye-slash fa-2x" style="color: #000";></i> &nbsp; &nbsp;
                    </a>
                     <?php }else{ ?>
                        <a href="aktivasi_informasi.php?id=<?php echo $dt['id']; ?>&status=non" onclick="return confirm('Anda yakin akan mengaktifkan artikel ini?')">
                        <i class="sidebar-item-icon fa fa-eye fa-2x" style="color: #000";></i> &nbsp; &nbsp;
                    </a>
                    <?php 
                    }
                    ?>

                </td>
                </tr>
             
             <?php
              endwhile;
              ?> 

            </tbody>
          </table>

      <?php } ?>

<!--PEGAWAI SIDEBAR-->
                          <?php 
                    $level = $_SESSION['level'];
                    if($level=='Pegawai'){
                    ?>

                 <div class="ibox ibox-primary">
                            <div class="ibox-head" style="background-color: #466B97;">
                                <div class="ibox-title">Daftar Informasi</div>
                                <div class="ibox-tools">
            
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
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Perangkat</th>
              </tr>
            </thead>
            <tbody>
                <?php
                // Tampilkan semua data
                

               $iddivisi=$_GET['iddivisi'];
                if(!empty($iddivisi)){
                    $q = $koneksi->query("SELECT * FROM informasi where iddivisi='$iddivisi'");
                }else{
                    $q = $koneksi->query("SELECT * FROM informasi");
                }

                $numb = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>

                <tr>  
                <td><?php echo $numb++ ?></td>
                <td><a href="detailinformasi.php?id=<?php echo $dt['id'] ?>"><?php echo $dt['judul'] ?></a></td>
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
                </tr>
             
             <?php
              endwhile;
              ?> 

            </tbody>
          </table>

      <?php } ?>

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