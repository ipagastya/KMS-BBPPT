    <?php 
        $koneksi = mysqli_connect("http://sql102.epizy.com","epiz_28500943","2kiHEuD0ypoRX4","epiz_28500943_proto_kms_bbppt");
     
        if (mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    ?>
