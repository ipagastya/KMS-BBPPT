<?php
require_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $nip = $_POST['nip'];
  $level = $_POST['level'];
  $iddivisi = $_POST['iddivisi'];
//divisi blm
  // id_produk bernilai '' karena kita set auto increment
  $q = $koneksi->query("INSERT INTO akun (username, password, nama, email, nip, iddivisi, level) VALUES ( '$username', MD5('$password'), '$nama', '$email', '$nip','$iddivisi', '$level')");

  if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='akun.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data gagal ditambahkan'); window.location.href='akun.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: akun.php');
}
?>