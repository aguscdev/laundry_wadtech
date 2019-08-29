<?php 
// menghubungkan dengan koneksi
session_start();
include '../config/koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['id'];
$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];

$status = $_POST['status'];

// mengambil data harga per kilo dari database
$h = mysqli_query($koneksi,"select harga_per_kilo from harga");
$harga_per_kilo = mysqli_fetch_assoc($h);

// menghitung harga laundry, harga perkilo x berat cucian
$harga = $berat * $harga_per_kilo['harga_per_kilo'];


// update data transaksi
$sql = "UPDATE transaksi SET transaksi_pelanggan='$pelanggan', transaksi_harga='$harga', transaksi_berat='$berat', transaksi_tgl_selesai='$tgl_selesai', transaksi_status='$status' WHERE transaksi_id='$id'";
// var_dump($sql);
// die;

// menangkap data form input array (jenis pakaian dan jumlah pakaian)
$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];


// menghapus semua pakaian dalam transaksi ini
mysqli_query($koneksi,"delete from pakaian where pakaian_transaksi='$id'");

// input ulang data cucian berdasarkan id transaksi (invoice) ke table pakaian
for($x=0;$x<count($jenis_pakaian);$x++){
	if($jenis_pakaian[$x] != ""){
		mysqli_query($koneksi,"insert into pakaian values('','$id','$jenis_pakaian[$x]','$jumlah_pakaian[$x]')");

	}
}

if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_transaksi.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_transaksi.php';
		</script>";
}

mysqli_close($koneksi);


?>