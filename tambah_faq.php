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
              <h1 class="page-title"> <i class="sidebar-item-icon fa fa-question";></i> Tambah FAQ</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > FAQ > <a href="tambah_faq.php" style="color: #0c2496;">Tambah FAQ</a> </li>
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
                                <div class="ibox-title">Tambah FAQ</div>
                                <div class="ibox-tools">
                                    <div class="dropdown-menu dropdown-menu-right">
                                       
                                      

                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">




                        <form method="post" action="save_faq.php">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <td><input type="text" class="form-control" name="pertanyaan"></td>
                                
                            </tr>
                            <tr>
                                <th>Jawaban</th>
                                <td><input type="text" class="form-control" name="jawaban"></td>
                            </tr>
                            <tr>
                                <th>Jenis FAQ</th>
                                <td>
                                    <select class="form-control" name="isrestricted" id="isrestricted">
                                            <option selected value="1">Non-publik</option>
                                            <option value="0">Publik</option>
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
            </div>
           <?php include "footeradmin.php" ?>
        </div>
    </div>
   
    <!-- END THEME CONFIG PANEL-->
    <?php include "cssbawah.php" ?>
</body>

</html>