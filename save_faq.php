<?php
require_once 'koneksi.php';
@session_start();
if (isset($_POST['submit'])) {
    $pertanyaan = $_POST['pertanyaan'];
    $jawaban = $_POST['jawaban'];
    $isRestricted = $_POST['isrestricted'];
    $username = $_SESSION['username'];
    $updated = date('Y-m-d');

//divisi blm
  // id_produk bernilai '' karena kita set auto increment
  $q = $koneksi->query("INSERT INTO faq (pertanyaan, jawaban, isRestricted, updated, author) VALUES ( '$pertanyaan', '$jawaban', '$isRestricted', '$updated','$username' )");

  if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='pengaturan_faq.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data gagal ditambahkan'); window.location.href='pengaturan_faq.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pengaturan_faq.php');
}
?>