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
            <div class="panel-heading">Tambah Pelanggan</div>
            <div class="panel-body">
            <form method="post" action="action_add_pelanggan.php">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="hp">No Handphone:</label>
                    <input type="number" name="hp" class="form-control" id="hp" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                </div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a class="btn btn-danger" href="v_pelanggan.php">Batal</a>
            </form>
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