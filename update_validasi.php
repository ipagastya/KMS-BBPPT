<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'koneksi.php';
session_start();
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $feedback = $_POST['feedback'];
  $status_approval = $_POST['status_approval'];
  $tanggal_verif = date('Y-m-d');
  $officer  = $_SESSION['username'];
  // update data berdasarkan id_produk yg dikirimkan
  // echo $officer;
 

  $q = $koneksi->query("UPDATE informasi SET feedback = '$feedback',status_approval = '$status_approval', tanggal_verif='$tanggal_verif', officer='$officer' WHERE id = '$id'"); 
  


  if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data berhasil diubah'); window.location.href='validasi_knowledge.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data gagal diubah'); window.location.href='validasi_knowledge.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman pengujian
  header('Location: akun.php');
}
?> 