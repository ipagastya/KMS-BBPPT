    <?php 
        // $koneksi = mysqli_connect("http://sql102.epizy.com","epiz_28500943","2kiHEuD0ypoRX4","epiz_28500943_proto_kms_bbppt");
     
        // if (mysqli_connect_errno()){
        //     echo "Koneksi database gagal : " . mysqli_connect_error();
        // }
        $servername = "remotemysql.com";
        $username = "1O7emlC26Q";
        $password = "3vjI3bdh1y";
        $dbname = "1O7emlC26Q";

        // Create connection
        $koneksi = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($koneksi->connect_error) {
            die("Connection failed: " . $koneksi->connect_error);
        } 
    ?>
