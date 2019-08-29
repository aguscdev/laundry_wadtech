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
            <div class="panel-heading">Edit Pelanggan</div>
              <div class="panel-body">
          			<?php
          			include '../config/koneksi.php';
          			$pelanggan_id = $_GET['pelanggan_id'];
          			$data = mysqli_query($koneksi,"select * from pelanggan where pelanggan_id='$pelanggan_id'");
          			while($d = mysqli_fetch_array($data)){
          			?>
            			<form method="post" action="action_edit_pelanggan.php"> <!-- update.php -->
              			<div class="form-group">
              			    <label for="nama">Name</label>
                         <input type="hidden" name="pelanggan_id" value="<?php echo $d['pelanggan_id']; ?>">
              			    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $d['pelanggan_nama']; ?>" required>
              			</div>
                          <div class="form-group">
                          <label for="hp">No Handphone:</label>
                          <input type="number" name="hp" class="form-control" id="hp" value="<?php echo $d['pelanggan_hp']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="alamat">Alamat:</label>
                          <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $d['pelanggan_alamat']; ?>" required>
                      </div>
                      <button type="submit" class="btn btn-info">Simpan</button>
                      <a class="btn btn-danger" href="v_pelanggan.php">Batal</a>
            			</form>
            			<?php 
            			}
            		?>
              </div>
            </div>
        </section><br>
      </div>
    </div>
  </div>
</body>
<?php include '../home/footer.php'; ?>
</html>
<?php
}
?>