<?php

require_once 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $username = $_GET['username'];
  $status = $_GET['status'];

  // update data berdasarkan id_produk yg dikirimkan
  if($status=='aktif'){
 $q = $koneksi->query("UPDATE akun SET status = 'Non Aktif'  WHERE id = '$id'"); 
 echo "<script>alert('Sukses menonaktifkan pengguna'); window.location.href='akun.php'</script>";
  }else{
       $q = $koneksi->query("UPDATE akun SET status = 'Aktif'  WHERE id = '$id'"); 
       echo "<script>alert('Sukses mengaktifkan pengguna'); window.location.href='akun.php'</script>";
  }

} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman pengujian
  header('Location: akun.php');
}
?>