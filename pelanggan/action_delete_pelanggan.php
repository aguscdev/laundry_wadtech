<?php 
// menghubungkan koneksi
session_start();
include '../config/koneksi.php';

// menangkap data id yang dikirim dari url
$pelanggan_id = $_GET['pelanggan_id'];

// menghapus pelanggan
$sql = "delete from pelanggan where pelanggan_id='$pelanggan_id'";

if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_pelanggan.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_pelanggan.php';
		</script>";
}

mysqli_close($koneksi);
?>
