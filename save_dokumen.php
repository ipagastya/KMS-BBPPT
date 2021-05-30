<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require_once "koneksi.php";

$judul = $_POST['judul'];
$nomordokumen = $_POST['nomordokumen'];
$jenisDokumen = $_POST['jenisDokumen'];
$tanggal = date('Y-m-d');
$idperangkat = $_POST['idperangkat'];
$iddivisi = $_POST['iddivisi'];
$restricted = $_POST['isrestricted'];
$author  = $_SESSION['username'];
$level = $_SESSION['level'];


$dokumen = $_FILES['dokumen']['name'];
$size = $_FILES['dokumen']['size'];
$tmp = $_FILES['dokumen']['tmp_name'];
$ex = explode('.',$dokumen);
$nama_baru = 'dokumen_'.time().'.'.strtolower($ex[1]);
$daftar_extensi =  array('jpg','png','jpeg','pdf');
$extensi = strtolower(end($ex));


 
if (!empty($judul)) {
  if ($dokumen != "" || $size != 0 ) {
    $pindah = move_uploaded_file($tmp,'src/image/'.$nama_baru);
    $query = $koneksi->query("INSERT INTO informasi (dokumen, jenisDokumen, judul,nomordokumen,tanggal,restricted,idperangkat,iddivisi, author, isDokumen, level) VALUES('$nama_baru','$jenisDokumen','$judul','$nomordokumen','$tanggal','$restricted','$idperangkat','$iddivisi','$author',1,'$level')");
  }
//   else{
//     $query = $koneksi->query("INSERT INTO informasi (judul,nomordokumen, tanggal,restricted,idperangkat,iddivisi, author, level) VALUES('$judul','$nomordokumen','$keterangan','$tanggal','$restricted','$idperangkat','$iddivisi','$author','$level')");
//   }


  if ($query){
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='status_upload.php'</script>";

  }else{
    echo "Error: " . $query . "<br>" . $koneksi->error;
  }
}else{
  echo "<script>alert('Data gagal ditambahkan'); window.location.href='dokumen.php'</script>";
}

?>