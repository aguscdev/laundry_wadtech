<?php 
// menghubungkan koneksi
session_start();
include '../config/koneksi.php';

// menangkap data yang dikirim dari form
$pelanggan_id = $_POST['pelanggan_id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

// update data
$sql = "UPDATE pelanggan SET pelanggan_nama='$nama',pelanggan_hp='$hp',pelanggan_alamat='$alamat' WHERE pelanggan_id='$pelanggan_id'";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_pelanggan.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_pelanggan.php';
		</script>";
}

mysqli_close($koneksi);

?>