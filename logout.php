   <?php 
        @session_start();
         
        // menghapus semua session
        @session_destroy();
     
        // mengalihkan halaman dan mengirim pesan logout
         echo "<script>window.location.href ='login.php';</script>";
    ?>
