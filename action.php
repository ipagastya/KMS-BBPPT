    <?php 
        ob_start();
        @session_start();
        include 'koneksi.php';
     
        // menangkap data yang dikirim dari form login
        $username = $_POST['username'];
        $password = $_POST['password'];
     
        // menyeleksi data pada tabel admin dengan username dan password yang sesuai
        $data = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$username' and password=md5('$password') and status='Aktif' ");
     
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
     
        if($cek > 0){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";

            while ($row=mysqli_fetch_array($data,MYSQLI_ASSOC))
            {
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] =  $row['email'];
            $_SESSION['level'] =  $row['level'];
            }
           
            echo "<script>window.location.href ='dashboard.php';</script>";
        }
        else{
             echo "<script>window.location.href ='login.php?pesan=gagal';</script>";
        }
    ?>
