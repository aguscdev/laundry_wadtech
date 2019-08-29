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
            <div class="panel-heading">Pengaturan Harga Laundry</div>
              <div class="panel-body">
          			<?php 
                include '../config/koneksi.php';
                
                $data = mysqli_query($koneksi,"select harga_per_kilo from harga");
                while($d=mysqli_fetch_array($data)){
                    ?>
                  <form method="post" action="action_edit_harga.php">
                    <div class="form-group">
                      <label>Harga per kilo</label>             
                      <input type="number" class="form-control" name="harga" value="<?php echo $d['harga_per_kilo']; ?>">
                    </div>    

                    <br/>

                    <input type="submit" class="btn btn-primary" value="Ubah Harga">  
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