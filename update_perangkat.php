<?php

require_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $namaperangkat = $_POST['namaperangkat'];
  $biaya = $_POST['biaya'];
  $iddivisi = $_POST['iddivisi'];
  // update data berdasarkan id_produk yg dikirimkan
     $q = $koneksi->query("UPDATE perangkat SET namaperangkat = '$namaperangkat',biaya='$biaya',iddivisi='$iddivisi' WHERE idperangkat = '$id'"); 
  


  if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data berhasil diubah'); window.location.href='perangkat.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data gagal diubah'); window.location.href='perangkat.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman pengujian
  header('Location: perangkat.php');
}
?>