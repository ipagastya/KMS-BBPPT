<?php

require_once 'koneksi.php';

// cek id
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // perintah hapus data berdasarkan id yang dikirimkan
  $q = $koneksi->query("DELETE FROM faq WHERE id = '$id'");

  // cek perintah
  if ($q) {
    // pesan apabila hapus berhasil
    echo "<script>alert('Data berhasil dihapus'); window.location.href='pengaturan_faq.php'</script>";
  } else {
    // pesan apabila hapus gagal
    echo "<script>alert('Data gagal dihapus'); window.location.href='pengaturan_faq.php'</script>";
  }
} else {
  // jika mencoba akses langsung ke file ini akan diredirect ke halaman index
  header('Location:pengaturan_faq.php');
}
?>