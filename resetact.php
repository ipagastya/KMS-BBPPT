<?php 
			  
	include "koneksi.php";
	if(!isset($_GET["code"])){
		echo "<script> alert('Halaman tidak ditemukan'); window.location = 'login.php'; </script>";
	}
	$code = $_GET["code"];
	$emailquery = "Select email from resetPasswords where code= '$code'";
	$getEmailquery = mysqli_query($koneksi,$emailquery);
	$rows = mysqli_fetch_array($getEmailquery);
	if(mysqli_num_rows($getEmailquery)== 0 ){
		echo "<script> alert('Halaman tidak ditemukan'); window.location = 'login.php'; </script>";
		
	}
	if(isset($_POST["password"])){
		$pw = $_POST["password"];
		$pw = md5($pw);
		 
		
		$email = $rows['email'];
		  
		$query = mysqli_query($koneksi, "UPDATE akun SET password= '$pw' where email='$email'");
		  
		if ($query){
			$query = mysqli_query($koneksi,"DELETE from resetPasswords where code='$code'");
			echo "<script> alert('Password berhasil diganti. Silahkan login dengan password baru!'); window.location = 'login.php'; </script>";				
		}
		else{
			echo "<script> alert('Terjadi kesalahan'); window.location = 'login.php'; </script>";
			
		}   
	}
?>

