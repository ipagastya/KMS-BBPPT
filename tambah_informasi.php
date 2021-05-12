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
      if(document.form1.idkategori.value == '<?php echo $row['iddivisi']; ?>')
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
              <h1 class="page-title"> <i class="sidebar-item-icon fa fa-newspaper-o";></i> Tambah Informasi</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > Informasi > <a href="tambah_informasi.php" style="color: #0c2496;">Tambah Informasi</a> </li>
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

              <form action="save_informasi.php" method="post" enctype="multipart/form-data" name="form1">  
      <table class="table table-bordered">
            <thead>
               <tr>
                <th>Judul</th>
                <td>
                 <input type="text" class="form-control" name="judul" required=""> 
                </td>
              </tr>
              <tr>
                <th>Nomor Dokumen</th>
                <td>
                 <input type="text" class="form-control" name="nomordokumen" required=""> 
                </td>
              </tr>
              <tr>
                <th style="vertical-align:top">Keterangan</th>
                <td><textarea class="form-control ckeditor" name="keterangan" id="content"></textarea>

                </td>
              </tr>
              <tr>
                <th style="vertical-align:top">Berita</th>
                <td><textarea class="form-control" name="berita"></textarea>

                </td>
              </tr>
              <tr>
                <th>Dokumen</th>
                <td> <input type="file" name="dokumen" value=""> </td>
              </tr>

              <tr>
                <th>Kategori</th>
                <td>
                      
                <select class="form-control" name="idkategori" onChange="SelectCat2();">
                    <?php
                    require_once 'koneksi.php';
                      // ambil data berdasarkan id_produk
                     $q = $koneksi->query("SELECT * FROM divisi");

                              $no = 1; // nomor urut
                              while ($row = $q->fetch_assoc()) :
                      ?>
                  <option value="<?php echo $row['iddivisi']; ?>">
                    <?php echo $row['namadivisi']; ?>
                  </option>
                     <?php
                    endwhile;
                  ?>
                </select> 

                </td>
              </tr>

              <tr>
                <th>Perangkat</th>
                <td>
                      
                <select class="form-control" name="idperangkat" id="idperangkat">
                  <option value=""></option>

              <!--       <?php
                    require_once 'koneksi.php';
                      // ambil data berdasarkan id_produk
                     $q = $koneksi->query("SELECT * FROM perangkat");

                              $no = 1; // nomor urut
                              while ($row = $q->fetch_assoc()) :
                      ?>
                  <option value="<?php echo $row['idperangkat']; ?>">
                    <?php echo $row['namaperangkat']; ?>
                  </option>
                     <?php
                    endwhile;
                  ?> -->
                </select> 

                </td>
              </tr>

              <tr>
                <td></td>
                <td>
                      <input type="submit" name="submit"  class="btn btn-primary" value="Simpan">
                </td>
              </tr>
            </thead>
          </table>
       </form>   


                </div>
                </div>
                </div>
            </div>
           <?php include "footeradmin.php" ?>
        </div>
    </div>
   <script>
 CKEDITOR.replace( 'keterangan', {
  height: 300,
  filebrowserUploadUrl: "upload.php"
 });
</script>
    <!-- END THEME CONFIG PANEL-->
    <?php include "cssbawah.php" ?>
</body>

</html>