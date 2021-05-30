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
    <script>
    function SelectCat2(){
      removeAllOptions(document.form1.idperangkat);

       <?php
      require_once 'koneksi.php';
        // ambil data berdasarkan id_produk
       $q = $koneksi->query("SELECT * FROM divisi");


                while ($row = $q->fetch_assoc()) :
        ?>
      if(document.form1.iddivisi.value == '<?php echo $row['iddivisi']; ?>')
      { 
           
                  <?php
                    require_once 'koneksi.php';
                      // ambil data berdasarkan id_produk
                    $iddivisi = $row['iddivisi'];
                     $q1 = $koneksi->query("SELECT * FROM perangkat where iddivisi='$iddivisi'");

                              $no = 1; // nomor urut
                              while ($row1 = $q1->fetch_assoc()) :
                  ?>
                 
                    addOption(document.form1.idperangkat,"<?php echo $row1['idperangkat']; ?>", " <?php echo $row1['namaperangkat']; ?>");
                  
                 <?php
                    endwhile;
                  ?> 

                  //addOption(document.form1.idperangkat,"", "Tidak Ada Perangkat");
                
               


      }
      <?php
      endwhile;
      ?>

    }
    function removeAllOptions(selectbox)
    { var i;
      for(i=selectbox.options.length-1;i>=0;i--)
      { selectbox.remove(i); }
    }
    function addOption(selectbox, value, text )
    { var optn = document.createElement("OPTION");
      optn.text = text;
      optn.value = value;
      selectbox.options.add(optn);
    }
    </script>
    
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
              <h1 class="page-title"> <i class="sidebar-item-icon fa fa-newspaper-o";></i> Form Validasi</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > Validasi Pengetahuan > <a href="edit_informasi.php" style="color: #0c2496;">Form Validasi</a> </li>
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

               <?php

            require_once 'koneksi.php';

            // cek id
            if (isset($_GET['id'])) {
              $id = $_GET['id'];

              // ambil data berdasarkan id_produk
              $q = $koneksi->query("SELECT * FROM informasi WHERE id = '$id'");

              while ($dt = $q->fetch_assoc()) :
              ?>


              <br><br>
            
      <table class="table table-bordered">
            <thead>
               <tr>
                <th>Judul</th>
                <td>
                  <?php echo $dt['judul'] ?>
                </td>
              </tr>
              <tr>
                <th>Nomor Dokumen</th>
                <td>
                  <?php echo $dt['nomordokumen'] ?>
                </td>
              </tr>
              

              <?php if ($dt['isDokumen'] == '0'){ ?>
                  <tr>
                    <th>Keterangan</th>
                    <td><?php echo $dt['keterangan'] ?></td>
                  </tr>
              <?php }else{ ?>
                  <tr>
                    <th>Jenis Dokumen</th>
                    <td><?php echo $dt['jenisDokumen'] ?></td>
                  </tr> 
              <?php }?>

              <tr>
                <th>Dokumen </th>
                <td><a href="src/image/<?php echo $dt['dokumen'] ?>"><button type="button" class="btn btn-danger">File</button></a>
                </td>
              </tr>

              <form action="update_validasi.php" method="post" enctype="multipart/form-data" name="form1"> 
            <input type="hidden" name="id" value="<?php echo $dt['id'] ?>">

            <tr>
                <th>Status Persetujuan</th>
                <td>
                  <select class="form-control" name="status_approval">
                  <option value="Revisi"
                    <?php
                    $local= $dt['status_approval'];
                    if($local=='Revisi'){ ?>
                      selected
                    <?php } ?>>
                    Revisi
                  </option>

                   <option value="Ditolak"
                    <?php
                    $local= $dt['status_approval'];
                    if($local=='Ditolak'){ 
                    ?>
                      selected
                    <?php } ?>>
                    Ditolak
                  </option>

                  <option value="Disetujui"
                    <?php
                    $local= $dt['status_approval'];
                    if($local=='Disetujui'){ 
                    ?>
                      selected
                    <?php } ?>>
                    Disetujui
                  </option>
                  </select>

       </td>
              </tr>

            <tr>
                <th style="vertical-align:top">Feedback</th>
                <td><textarea class="form-control" name="feedback" id="content"><?php echo $dt['feedback'] ?></textarea></td>
              </tr>
              
              <tr>
                <td></td>
                <td>
                      <input type="submit" name="submit"  class="btn btn-primary" value="Validasi">
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
           <?php include "footeradmin.php" ?>
        </div>
    </div>
    <script>
  CKEDITOR.replace( 'feedback', {
  height: 300
 });
</script>
    <!-- END THEME CONFIG PANEL-->
    <?php include "cssbawah.php" ?>
</body>

</html>