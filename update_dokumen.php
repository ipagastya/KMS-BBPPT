<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require_once "koneksi.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$nomordokumen= $_POST['nomordokumen'];
$jenisDokumen = $_POST['jenisDokumen'];
$idperangkat = $_POST['idperangkat'];
$iddivisi = $_POST['iddivisi'];
$author  = $_SESSION['username'];
$tanggal = date('Y-m-d');
$level = $_SESSION['level'];



// $koneksi->query("UPDATE informasi SET  judul='$judul',nomordokumen='$nomordokumen', keterangan='$keterangan', idperangkat='$idperangkat', iddivisi='$iddivisi', author='$author', tanggal='$tanggal' WHERE id='$id'");


$dokumen= $_FILES['dokumen']['name'];
$size = $_FILES['dokumen']['size'];
$dokumen_lama = $_POST['dokumen_lama'];
$tmp = $_FILES['dokumen']['tmp_name'];
$ex = explode('.',$dokumen);
$nama_baru = 'dokumen_'.time().'.'.strtolower($ex[1]);
 
 
$daftar_extensi =  array('jpg','png','jpeg','pdf');
$extensi = strtolower(end($ex));

if ($dokumen != "" || $size != 0 ) {
  $pindah = move_uploaded_file($tmp,'src/image/'.$nama_baru);
  $query = $koneksi->query("UPDATE informasi SET dokumen='$nama_baru', judul='$judul',nomordokumen='$nomordokumen', jenisDokumen='$jenisDOkumen', idperangkat='$idperangkat', iddivisi='$iddivisi', author='$author', tanggal='$tanggal', level='$level', status_approval='Pending' WHERE id='$id'");
  if (file_exists('src/image/'.$dokumen_lama)) {
    unlink('src/image/'.$dokumen_lama);
  }
  //  echo "<script>alert('Data berhasil diubah'); window.location.href='informasi.php'</script>";
}else{
  $query = $koneksi->query("UPDATE informasi SET judul='$judul',nomordokumen='$nomordokumen', jenisDokumen='$jenisDOkumen', idperangkat='$idperangkat', iddivisi='$iddivisi', author='$author', tanggal='$tanggal', level='$level', status_approval='Pending' WHERE id='$id'");
  // echo "<script>alert('Data berhasil diubah'); window.location.href='informasi.php'</script>";
}

if ($query){
  echo "<script>alert('Data berhasil diubah'); window.location.href='informasi.php'</script>";

}else{
  echo "Error: " . $query . "<br>" . $koneksi->error;
}
?>