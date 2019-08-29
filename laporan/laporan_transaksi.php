<!DOCTYPE html>
<html>
	<!-- cek apakah sudah login -->
<?php
session_start();
if ($_SESSION['username']=='') {
  header('location:../admin/login.php');

  
}else{

  $user = $_SESSION["username"];
  $user_id = $_SESSION["user_id"];  
  $level = $_SESSION["level"];

   include '../home/header.php'; 

?>
<body class="hold-transition skin-blue sidebar-mini">
  	<div class="wrapper">
    	<?php include '../home/sidebar.php'; ?>
		<div class="contents">
  			<!-- Content Wrapper. Contains page content -->
 			<div class="content-wrapper">
    			<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="panel panel-default">
						<div class="panel-heading">Filter Laporan</div>
						<div class="panel-body">		
							<form action="laporan_transaksi.php" method="get">
								<table id="dtUser" class="table table-bordered">
									<tr>				
										<th>Dari Tanggal</th>
										<th>Sampai Tanggal</th>							
										<th width="1%"></th>
									</tr>
									<tr>
										<td><br/>
											<input type="date" name="tgl_dari" class="form-control">
										</td>
										<td><br/>
											<input type="date" name="tgl_sampai" class="form-control"><br/>
										</td>
										<td><br/>
											<input type="submit" class="btn btn-primary" value="Filter">
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div><br/>
					<?php 
					if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
					$dari = $_GET['tgl_dari'];
					$sampai = $_GET['tgl_sampai'];
					?>
					<div class="panel">
						<div class="panel-heading">
							<h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
						</div>
						<div class="panel-body">			
							<a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>
							<a target="_blank" href="cetak_pdf.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK PDF</a>
							<br/>
							<br/>
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
								include '../config/koneksi.php';
					
								$data = mysqli_query($koneksi,"select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id and date(transaksi_tgl) > '$dari' and date(transaksi_tgl) < '$sampai' order by transaksi_id desc");
								$no = 1;
								
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
								<?php } ?>							
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
		<?php } ?>
	</div>
</body>
<?php include '../home/footer.php'; ?>
</html>
<?php } ?>