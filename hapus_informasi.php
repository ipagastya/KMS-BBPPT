<?php
 
require "koneksi.php";
 
$id = $_GET['id'];
 
$query = $koneksi->query("SELECT * FROM informasi WHERE id='$id'");
$data = $query->fetch_assoc();
 
$query_hapus = $koneksi->query("DELETE FROM informasi WHERE id='$id'");
 
if (file_exists('src/image/'.$data['dokumen'])) {
  unlink('src/image/'.$data['dokumen']);
}
 
echo "<script>alert('Data berhasil dihapus'); window.location.href='informasi.php'</script>";

?>