<?php 
// menghubungkan koneksi
session_start();
include '../config/koneksi.php';;

// menangkap data yang dikirim dari form
$harga = $_POST['harga'];

// update data
// mysqli_query($koneksi,"update harga set harga_per_kilo='$harga'");

$sql = "UPDATE harga SET harga_per_kilo='$harga'";

if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('harga berhasil diubah');
				document.location.href = 'v_edit_harga.php';
		</script>";
}else{
	echo "<script>
				alert('harga berhasil diubah');
				document.location.href = 'v_edit_harga.php';
		</script>";
}

mysqli_close($koneksi);


// mengalihkan halaman kembali ke halaman pelanggan
// header("location:harga.php");

?>