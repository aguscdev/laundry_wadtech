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
            <div class="panel-heading">Edit Transaksi Laundry</div>
            <div class="panel-body">
              <?php 
              include '../config/koneksi.php'; 
              $id = $_GET['id'];
              $transaksi = mysqli_query($koneksi,"select * from transaksi where transaksi_id='$id'");
              while($t=mysqli_fetch_array($transaksi)){
                ?>
            <form method="post" action="action_edit_transaksi.php">
              <input type="hidden" name="id" value="<?php echo $t['transaksi_id']; ?>">
              <div class="form-group">
                <label>Pelanggan</label>
                <select class="form-control" name="pelanggan" required="required">  
                  <option value="">- Pilih Pelanggan</option>           
                  <?php   
                    include '../config/koneksi.php';          
                    $data = mysqli_query($koneksi,"select * from pelanggan");           
                    while($d=mysqli_fetch_array($data)){
                    ?>
                  <option <?php if($d['pelanggan_id']==$t['transaksi_pelanggan']){echo "selected='selected'";} ?> value="<?php echo $d['pelanggan_id']; ?>"><?php echo $d['pelanggan_nama']; ?></option>                
                  <?php 
                  }
                  ?>    
                </select>       
                </div>  
                <div class="form-group">
                    <label for="berat">Berat:</label>
                    <input type="number" name="berat" class="form-control" id="berat" required  value="<?php echo $t['transaksi_berat']; ?>">
                </div>
                <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai:</label>
                    <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" required value="<?php echo $t['transaksi_tgl_selesai']; ?>">
                </div>
                <br/>

                <table class="table table-bordered table-striped">
                  <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                  </tr>   

                  <?php 
                  include '../config/koneksi.php';
                  $id_transaksi = $t['transaksi_id'];
                  $pakaian = mysqli_query($koneksi,"select * from pakaian where pakaian_transaksi='$id_transaksi'");

                  while($p=mysqli_fetch_array($pakaian)){
                    ?>          
                    <tr>
                      <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $p['pakaian_jenis']; ?>"></td>
                      <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $p['pakaian_jumlah']; ?>"></td>
                    </tr>
                    <?php } ?>
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
                  <div class="form-group alert alert-info">
                <label>Status</label>
                <select class="form-control" name="status" required="required">                   
                  <option <?php if($t['transaksi_status']=="0"){echo "selected='selected'";} ?> value="0">PROSES</option>                                   
                  <option <?php if($t['transaksi_status']=="1"){echo "selected='selected'";} ?> value="1">DI CUCI</option>                                    
                  <option <?php if($t['transaksi_status']=="2"){echo "selected='selected'";} ?> value="2">SELESAI</option>                                    
                </select>       
              </div>  
                <button type="submit" class="btn btn-info">Simpan</button>
                <a class="btn btn-danger" href="v_transaksi.php">Batal</a>
            </form>
            <?php } ?>
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