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
            <div class="panel-heading">Transaksi Laundry Baru</div>
            <div class="panel-body">
            <form method="post" action="action_add_transaksi.php">
              <div class="form-group">
                <label>Pelanggan</label>
                <select class="form-control" name="pelanggan" required="required">  
                  <option value="">- Pilih Pelanggan</option>           
                  <?php   
                    include '../config/koneksi.php';          
                    $data = mysqli_query($koneksi,"select * from pelanggan");           
                    while($d=mysqli_fetch_array($data)){
                    ?>
                    <option value="<?php echo $d['pelanggan_id']; ?>"><?php echo $d['pelanggan_nama']; ?></option>                
                    <?php 
                  }
                  ?>    
                </select>       
                </div>  
                <div class="form-group">
                    <label for="berat">Berat:</label>
                    <input type="number" name="berat" class="form-control" id="berat" required>
                </div>
                <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai:</label>
                    <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" required>
                </div>
                <br/>

                <table class="table table-bordered table-striped">
                  <tr>
                    <th>Jenis Pakaian:</th>
                    <th width="20%">Jumlah:</th>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                  </tr>
                </table>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a class="btn btn-danger" href="v_transaksi.php">Batal</a>
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