<?php

require_once 'koneksi.php';
@session_start();
if (isset($_POST['submit'])) {
  $idfaq = $_POST['idfaq'];
  $pertanyaan = $_POST['pertanyaan'];
  $jawaban = $_POST['jawaban'];
  $isRestricted = $_POST['isrestricted'];
  $username = $_SESSION['username'];
  $updated = date('Y-m-d');


  // update data berdasarkan id  yg dikirimkan
     $q = $koneksi->query("UPDATE faq SET pertanyaan = '$pertanyaan', jawaban='$jawaban', isRestricted=$isRestricted, author='$username' , updated='$updated' WHERE ID = '$idfaq'"); 
  


  if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data berhasil diubah'); window.location.href='pengaturan_faq.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data gagal diubah'); window.location.href='pengaturan_faq.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman pengujian
  header('Location: pengaturan_faq.php');
}
?>