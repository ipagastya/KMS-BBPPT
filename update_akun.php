<?php

require_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $nip = $_POST['nip'];
  $level = $_POST['level'];
  $iddivisi = $_POST['iddivisi'];
  // update data berdasarkan id_produk yg dikirimkan
  if(empty($password)){


  $q = $koneksi->query("UPDATE akun SET username = '$username', nama = '$nama',  email = '$email',  nip = '$nip', iddivisi='$iddivisi', level='$level'  WHERE id = '$id'"); 
  }else{
       $q = $koneksi->query("UPDATE akun SET username = '$username',  password = MD5('$password'),  nama = '$nama',  email = '$email',  nip = '$nip', iddivisi='$iddivisi', level='$level' WHERE id = '$id'");
  }


  if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data berhasil diubah'); window.location.href='akun.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data gagal diubah'); window.location.href='akun.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman pengujian
  header('Location: akun.php');
}
?>