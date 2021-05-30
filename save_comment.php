<?php
	require_once "koneksi.php";

	if (isset($_POST['submit'])) {
		$comment_text = $_POST['comment_text'];
		$user = $_POST['username'];
		$idinfo = $_POST['idinformasi'];

		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s', time());

		$qlookidakun = $koneksi->query("SELECT id FROM akun WHERE username = '$user' LIMIT 1");
		if ($qlookidakun) {
			while ($temp = $qlookidakun->fetch_assoc()) {
				$idakun = $temp['id'];
			}

			$qaddcomment = $koneksi->query("
				INSERT INTO komentar (idakun, idinformasi, tanggal, isi)
				VALUES ('$idakun', '$idinfo', '$now', '$comment_text')
			");
			if ($qaddcomment) {
				echo "<script>window.location.href='detailinformasi.php?id=$idinfo'</script>";
			}
			else{
				echo "<script>alert('Gagal komentar'); window.location.href='detailinformasi.php?id=$idinfo'</script>";
			}
		}
		else{
			echo "<script>alert('Username tidak ditemukan! Gagal komentar'); window.location.href='detailinformasi.php?id=$idinfo'</script>";
		}
	}
	// else {
	// 	header("Location: detailinformasi.php?id='$idinfo'");
	// }

?>