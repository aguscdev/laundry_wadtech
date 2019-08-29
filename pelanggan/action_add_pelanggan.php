<?php 

session_start();
// menghubungkan dengan koneksi
include '../config/koneksi.php';

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

// input data ke tabel pelanggan
$sql = "INSERT INTO pelanggan values('','$nama','$hp','$alamat')";
// var_dump($sql);
// die;
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_pelanggan.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_pelanggan.php';
		</script>";
}

mysqli_close($koneksi);

?>