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
<script type="text/javascript" src="libs/chartjs/Chart.js"></script>
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
                <h1 class="page-title"> <i class="sidebar-item-icon fa fa-th-large";></i> Beranda</h1>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">Beranda > <a href="dashboard_new.php" style="color: #0c2496;">Knowledge Terbaru</a> </li>
                </ol>
                <br>
                <br>
                <?php
                        // Tampilkan semua data
                        include"koneksi.php";
                        $level = $_SESSION['level'];
                        if($level=='Officer'){ 
                ?>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <br>
                                <?php
                                $q = $koneksi->query("SELECT COUNT(status_approval) as total FROM informasi WHERE status_approval='DISETUJUI'; "); 
                                $dt = $q->fetch_assoc();?>
                                <h2 class="m-b-5 font-strong"><?php echo $dt['total'];?></h2>
                                <div class="m-b-5">DISETUJUI</div><i class="fa fa-check-circle-o widget-stat-icon"></i>
                                <br>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <br>
                                <?php
                                $q = $koneksi->query("SELECT COUNT(status_approval) as total FROM informasi WHERE status_approval='PENDING'; "); 
                                $dt = $q->fetch_assoc();?>
                                <h2 class="m-b-5 font-strong"><?php echo $dt['total'];?></h2>
                                <div class="m-b-5">PENDING</div><i class="fa fa-hourglass-start widget-stat-icon"></i>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <br>
                                <?php
                                $q = $koneksi->query("SELECT COUNT(status_approval) as total FROM informasi WHERE status_approval='REVISI'; "); 
                                $dt = $q->fetch_assoc();?>
                                <h2 class="m-b-5 font-strong"><?php echo $dt['total'];?></h2>
                                <div class="m-b-5">REVISI</div><i class="fa fa-archive widget-stat-icon"></i>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <br>
                                <?php
                                $q = $koneksi->query("SELECT COUNT(status_approval) as total FROM informasi WHERE status_approval='DITOLAK'; "); 
                                $dt = $q->fetch_assoc();?>
                                <h2 class="m-b-5 font-strong"><?php echo $dt['total'];?></h2>
                                <div class="m-b-5">DITOLAK</div><i class="fa fa-times widget-stat-icon"></i>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                <!--<div class="box">-->
                    <div class="container">
                      <!--<form>
                        <i class="sidebar-item-icon fa fa-search"></i>
                        <input class="navbar-search" type="text" placeholder="Cari Judul Informasi" required> 
                        <button class="btn btn-lg" type="submit" style="margin-right: 100px; background-color: #13CEF8;width: 100px; ">Search</button>     
                        </form>-->
                        <?php
                        include"koneksi.php";
                        $level = $_SESSION['level'];
                        if($level=='Officer'){  ?>  
                        <div>
                            <canvas id="myChart" style="width: 100%;height: 200px;"></canvas> 
                        </div> 
                        <?php }?>

                    </div>
                <!--</div>-->
            </div>

            <div class="page-content fade-in-up">
                <div class="row">
                 
                    <div class="container"> 

                        <br><br>
                        <div class="ibox ibox-primary">
                            <div class="ibox-head" style="background-color: #466B97;">
                                <div class="ibox-title">Knowledge Terbaru</div>
                                <div class="ibox-tools"></div>
                            </div>
                        </div>

                        <?php
                        // Tampilkan semua data
                        include"koneksi.php";
                        $q = $koneksi->query("SELECT * FROM informasi where status_approval='Disetujui' order by tanggal desc limit 5");

                        // $level = $_SESSION['level'];
                        // if($level=='Officer'){
                        //     $q = $koneksi->query("SELECT * FROM informasi order by tanggal desc limit 5");
                        // } else {
                        // error_reporting(E_ALL ^ E_NOTICE);
                        // session_start();
                        // $username = $_SESSION['username'];

                        // $q = $koneksi->query("SELECT * FROM informasi where author='$username' order by tanggal desc limit 5");
                        // }

                        $no = 1; // nomor urut
                        while ($dt = $q->fetch_assoc()) :
                        ?>
                        
                        <div class="container">
                            <!--<div class="span8">-->
                                <div class="row">
                                    <div class="span8">
                                        <h4><strong><a href="detailinformasi.php?id=<?php echo $dt['id'] ?>"><?php echo $dt['judul'] ?></a></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span2">
                                        <a href="#" class="thumbnail">
                                            <img src="http://placehold.it/260x180" alt="">
                                        </a>
                                    </div>
                                    <div class="span6">      
                                        <p>
                                        Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea.
                                        </p>
                                        <p><a href="detailinformasi.php?id=<?php echo $dt['id'] ?>">Read more</a></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span8">
                                        <p></p>
                                        <p>
                                        <i class="icon-user"></i> by <?php echo $dt['author'] ?></a> 
                                        | <i class="icon-calendar"></i> <?php echo $dt['tanggal'] ?>
                                        | <i class="icon-comment"></i> 3 Comments
                                        <?php
                                            $judul         = $dt['judul'];
                                            $username      = $_SESSION['username'];
                                            $data = $koneksi->query("SELECT * FROM favorit WHERE judul='$judul' and  username='$username'");
                                            $cek = mysqli_num_rows($data);
                                    
                                            if($cek > 0){
                                                $q2 = $koneksi->query("SELECT * FROM favorit WHERE judul='$judul' and  username='$username'");
                                                while ($dt2 =  $q2->fetch_assoc()) {
                                                $cek1=$dt2['id'];  
                                                    if($cek1){
                                                    ?>
                                                                    
                                                        | <a href="hapus_favorit.php?id=<?php echo $dt2['id']; ?>" onclick="return confirm('Anda yakin akan menghapus favorit?')">
                                                            <i class="sidebar-item-icon fa fa-star fa-3x" style="color: #e6c34a";></i>
                                                        </a>
                                                    <?php
                                                    }
                                                }
                                            }else{
                                            ?>
                                    

                                                    | <a href="save_favorit.php?id=<?php echo $dt['id']; ?>&judul=<?php echo $dt['judul']; ?>" onclick="return confirm('Berhasil Favorit')">
                                                        <i class="sidebar-item-icon fa fa-star-o fa-3x" style="color: #000";></i>
                                                    </a>
                                            <?php
                                            }
                                            ?>
                                        
                                        </p>
                                    </div>
                                </div>
                            </div>
                        
                        <hr>

                        <?php
                        endwhile;
                        ?>
                        </div>
                        
                    
                </div>
            </div>
           <?php include "footeradmin.php" ?>
        </div>
    </div>
  
    <!-- END THEME CONFIG PANEL-->
     <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
       
        labels: [
         <?php
                // Tampilkan semua data
                include"koneksi.php";

                $q = $koneksi->query("SELECT COUNT(level) as count,level FROM informasi GROUP BY level");

                $no = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>
        "<?php echo $dt['level'] ?>",
        <?php
              endwhile;
              ?> 
        ],
        
        datasets: [{
          label: 'Data Jumlah Informasi',
         
          data: [
           <?php
                // Tampilkan semua data
                include"koneksi.php";

                $q = $koneksi->query("SELECT COUNT(level) as count,level FROM informasi GROUP BY level");

                $no = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                ?>
          <?php echo $dt['count'] ?>,
             <?php
              endwhile;
              ?> 
              ],
        
       

          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
    <?php include "cssbawah.php" ?>
</body>

</html>