<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];
$isactive = 1;

//generated user id
$sqlID = "SELECT `user_id` FROM user ORDER BY `user_id` DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['user_id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO user values($myID,'$nama','$username','$password','$level','$myDate','$myDate',$myUserID,$myUserID,$isactive)";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_user.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_user.php';
		</script>";
}

mysqli_close($koneksi);
?>