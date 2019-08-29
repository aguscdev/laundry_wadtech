<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$user_id = $_GET['user_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE user SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE `user_id` = $user_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_user.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_user.php';
		</script>";
}

mysqli_close($koneksi);

?>