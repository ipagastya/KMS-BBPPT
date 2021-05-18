<?php
require_once "koneksi.php";
 
if (isset($_POST['submit'])) {
$namaperangkat = $_POST['namaperangkat'];
$biaya = $_POST['biaya'];

 // id_produk bernilai '' karena kita set auto increment
  $q = $koneksi->query("INSERT INTO perangkat (idperangkat, namaperangkat, biaya, iddivisi) VALUES ( '$idperangkat', '$namaperangkat', '$biaya', 7)");

  if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Berhasil ditambahkan'); window.location.href='perangkat.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Gagal ditambahkan'); window.location.href='perangkat.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: perangkat.php');
}
?>