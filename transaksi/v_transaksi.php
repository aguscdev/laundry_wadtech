<!DOCTYPE html>
<html>

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
                <div class="panel-heading">Master Transaksi</div>
                <div class="panel-body">
                <a class="btn btn-success" href="../transaksi/v_add_transaksi.php">Transaksi Baru</a><br/><br/>
                    <table id="dtUser" class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Berat (Kg)</th>
                            <th>Tgl. Selesai</th>
                            <th>Harga</th>
                            <th>Status</th>             
                            <th>OPSI</th>
                        </thead>
                        <tbody>
                            <?php
                                include '../config/koneksi.php';
                                $data = mysqli_query($koneksi,"select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id order by transaksi_id desc");
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
                                <td>
                                    <a href="v_transaksi_invoice.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank" class="btn btn-sm btn-warning">Invoice</a>
                                    <a href="v_edit_transaksi.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                    <a href="action_delete_transaksi.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-danger">Batalkan</a>
                                </td>
                            </tr>
                            <?php
                                };
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section><br>
      </div>
    </div>
  </div>
</body>
<?php include '../home/footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
		$('#dtUser').DataTable();
	});
</script>
</html>
<?php
}
?>