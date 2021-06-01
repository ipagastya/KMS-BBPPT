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
                <h1 class="page-title"> <i class="sidebar-item-icon fa fa- fa-question";></i> FAQ</h1>
                <ol class="breadcrumb">
                    
                      <li class="breadcrumb-item">Beranda > <a href="faq.php" style="color: #0c2496;">FAQ</a> </li>
                   
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

                <div class="ibox-body">
                            
                
                <?php
                // Tampilkan semua data
                        
                $q = $koneksi->query("SELECT * FROM faq");
                $numb = 1; // nomor urut
                while ($dt = $q->fetch_assoc()) :
                    $numb++
                ?>
                   
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="heading<?php echo $numb ;?>" style="background-color: #E5E5E5;>
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $numb ;?>" aria-expanded="true" aria-controls="collapse<?php echo $numb ;?>">
                                <?php echo $dt['pertanyaan'] ?>
                                </button>
                            </h5>
                            </div>

                            <div id="collapse<?php echo $numb ;?>" class="collapse" aria-labelledby="heading<?php echo $numb ;?>" data-parent="#accordion">
                            <div class="card-body">
                                <?php echo $dt['jawaban'] ?>
                            </div>
                            </div>
                        </div>
                    </div>
              
            
                <?php
                endwhile;
                ?> 


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