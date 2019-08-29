<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Laundry</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/wadtech.png" />
	<link rel="stylesheet" type="text/css" href="../assets/assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/assets/js/bootstrap.js"></script>

</head>
<body>
	<!-- cek apakah sudah login -->
<?php
session_start();
if ($_SESSION['username']=='') {
  header('location:../admin/login.php');

  
}else{

  $user = $_SESSION["username"];
  $user_id = $_SESSION["user_id"];  
  $level = $_SESSION["level"];

?>
<?php 
	include '../config/koneksi.php';
	?>
	<div class="container">

		<center><h2>LAUNDRY " WaDTech "</h2></center>
		<br/>
		<br/>
		<?php 
		if(isset($_GET['dari']) && isset($_GET['sampai'])){

			$dari = $_GET['dari'];
			$sampai = $_GET['sampai'];
			?>
			<h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Invoice</th>
					<th>Tanggal</th>
					<th>Pelanggan</th>
					<th>Berat (Kg)</th>
					<th>Tgl. Selesai</th>
					<th>Harga</th>
					<th>Status</th>				
				</tr>

				<?php 
				

					// mengambil data pelanggan dari database
				$data = mysqli_query($koneksi,"select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id and date(transaksi_tgl) > '$dari' and date(transaksi_tgl) < '$sampai' order by transaksi_id desc");
				$no = 1;
					// mengubah data ke array dan menampilkannya dengan perulangan while
				while($d=mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
						<td><?php echo $d['transaksi_tgl']; ?></td>
						<td><?php echo $d['pelanggan_nama']; ?></td>
						<td><?php echo $d['transaksi_berat']; ?></td>
						<td><?php echo $d['transaksi_tgl_selesai']; ?></td>
						<td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
						<td>
							<?php 
							if($d['transaksi_status']=="0"){
								echo "<div class='label label-warning'>PROSES</div>";
							}else if($d['transaksi_status']=="1"){
								echo "<div class='label label-info'>DICUCI</div>";
							}else if($d['transaksi_status']=="2"){
								echo "<div class='label label-success'>SELESAI</div>";
							}
							?>							
						</td>								
					</tr>
					<?php 
				}
				?>
			</table>			
			<?php } ?>

		</div>

		<script type="text/javascript">
			window.print();
		</script>

	</body>
	</html>
	<?php } ?>