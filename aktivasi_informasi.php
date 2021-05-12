<?php

require_once 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $username = $_GET['username'];
  $status = $_GET['status'];

  // update data berdasarkan id_produk yg dikirimkan
  if($status=='aktif'){
 $q = $koneksi->query("UPDATE informasi SET restricted = 'Non Aktif'  WHERE id = '$id'"); 
 echo "<script>alert('Sukses menonaktifkan artikel'); window.location.href='informasi.php'</script>";
  }else{
       $q = $koneksi->query("UPDATE informasi SET restricted = 'Aktif'  WHERE id = '$id'"); 
       echo "<script>alert('Sukses mengaktifkan artikel'); window.location.href='informasi.php'</script>";
  }

} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman pengujian
  header('Location: informasi.php');
}
?>