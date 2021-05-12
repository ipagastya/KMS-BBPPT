<?php

require_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $iddivisi = $_POST['iddivisi'];
  $namadivisi = $_POST['namadivisi'];
  // update data berdasarkan id_produk yg dikirimkan
     $q = $koneksi->query("UPDATE divisi SET namadivisi = '$namadivisi' WHERE iddivisi = '$iddivisi'"); 
  


  if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data berhasil diubah'); window.location.href='divisi.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data gagal diubah'); window.location.href='divisi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman pengujian
  header('Location: divisi.php');
}
?>