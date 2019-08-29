<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$user_id = $_POST['user_id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE user SET nama='$nama',username='$username',`password`='$password',`level`='$level',updated_at='$myDate',updated_by=$myUserID WHERE `user_id` = $user_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_user.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_user.php';
		</script>";
}

mysqli_close($koneksi);

?>