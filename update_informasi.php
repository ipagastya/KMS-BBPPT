<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once "koneksi.php";
 
$id = $_POST['id'];
$judul = $_POST['judul'];
$nomordokumen= $_POST['nomordokumen'];
$keterangan = $_POST['keterangan'];
$idperangkat = $_POST['idperangkat'];
$iddivisi = $_POST['iddivisi'];
$author  = $_SESSION['username'];
$tanggal = date('Y-m-d');


$koneksi->query("UPDATE informasi SET  judul='$judul',nomordokumen='$nomordokumen', keterangan='$keterangan', idperangkat='$idperangkat', iddivisi='$iddivisi', author='$author', tanggal='$tanggal' WHERE id='$id'");


$dokumen= $_FILES['dokumen']['name'];
$dokumen_lama = $_POST['dokumen_lama'];
$tmp = $_FILES['dokumen']['tmp_name'];
$ex = explode('.',$dokumen);
$nama_baru = 'dokumen_'.time().'.'.strtolower($ex[1]);
 
 
$daftar_extensi =  array('jpg','png','jpeg','pdf');
$extensi = strtolower(end($ex));
 
if (!empty($dokumen)) {
  $pindah = move_uploaded_file($tmp,'src/image/'.$nama_baru);
  $query = $koneksi->query("UPDATE informasi SET dokumen='$nama_baru', author=$author, tanggal='$tanggal' WHERE id='$id'");
  if (file_exists('src/image/'.$dokumen_lama)) {
    unlink('src/image/'.$dokumen_lama);
  }
   echo "<script>alert('Data berhasil diubah'); window.location.href='informasi.php'</script>";
}else{
  echo "<script>alert('Data berhasil diubah'); window.location.href='informasi.php'</script>";
}
?>