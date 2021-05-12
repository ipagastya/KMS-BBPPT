<?php
@session_start();
require_once 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $judul = $_GET['judul'];
  $username = $_SESSION['username'];
  $tanggal = date('Y-m-d');
//divisi blm
  // id_produk bernilai '' karena kita set auto increment
  $q = $koneksi->query("INSERT INTO favorit (idinformasi, judul, username, tanggal) VALUES ( '$id', '$judul', '$username', '$tanggal')");

  if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Berhasil Favoritkan'); window.location.href='dashboard.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Gagal Favoritkan'); window.location.href='dashboard.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: dashboard.php');
}
?>