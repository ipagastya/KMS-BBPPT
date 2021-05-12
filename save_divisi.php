<?php
require_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $namadivisi = $_POST['namadivisi'];

//divisi blm
  // id_produk bernilai '' karena kita set auto increment
  $q = $koneksi->query("INSERT INTO divisi (namadivisi) VALUES ( '$namadivisi')");

  if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='divisi.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data gagal ditambahkan'); window.location.href='divisi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: divisi.php');
}
?>