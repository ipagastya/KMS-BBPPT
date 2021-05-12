<?php
require_once "koneksi.php";
 
$judul = $_POST['judul'];
$nomordokumen = $_POST['nomordokumen'];
$keterangan = $_POST['keterangan'];
$berita = $_POST['berita'];
$tanggal = date('Y-m-d');
$idperangkat = $_POST['idperangkat'];
$idkategori = $_POST['idkategori'];


$dokumen = $_FILES['dokumen']['name'];
$tmp = $_FILES['dokumen']['tmp_name'];
$ex = explode('.',$dokumen);
$nama_baru = 'dokumen_'.time().'.'.strtolower($ex[1]);
 
$daftar_extensi =  array('jpg','png','jpeg','pdf');
$extensi = strtolower(end($ex));


 
if (!empty($judul)) {
  $pindah = move_uploaded_file($tmp,'src/image/'.$nama_baru);
  $query = $koneksi->query("INSERT INTO informasi (dokumen,judul,nomordokumen,keterangan,berita,tanggal,idperangkat,idkategori) VALUES('$nama_baru','$judul','$nomordokumen','$keterangan','$berita','$tanggal','$idperangkat','$idkategori')");

  echo "<script>alert('Data berhasil ditambahkan'); window.location.href='informasi.php'</script>";
}else{
  echo "<script>alert('Data gagal ditambahkan'); window.location.href='informasi.php'</script>";
}

?>