<!DOCTYPE html>
<html>
<?php
session_start();
if ($_SESSION['username']=='') 
{
  header('location:../admin/login.php');

}
  else{

  $user = $_SESSION["username"];
  $user_id = $_SESSION["user_id"];  
  $level = $_SESSION["level"];

include '../home/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="contents">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <?php include '../config/koneksi.php'; ?>
          <h1>
            Dashboard <?php echo $_SESSION["username"]; ?>
          </h1><br/>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php 
                    $sql = "select count(*) as transaksi_id from transaksi";
                    $query = $koneksi->query($sql);
                    $count = $query->fetch_assoc();
                  ?>
                  <h3><?php echo $count['transaksi_id']; ?></h3>

                  <p>Jumlah Transaksi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="../laporan/laporan_transaksi.php" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <?php 
                    $sql = "select count(*) as pakaian_jenis from pakaian";
                    $query = $koneksi->query($sql);
                    $count = $query->fetch_assoc();
                  ?>
                  <h3><?php echo $count['pakaian_jenis']; ?></h3>

                  <p>Jumlah Pakaian</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php 
                    $sql = "select count(*) as pelanggan_nama from pelanggan";
                    $query = $koneksi->query($sql);
                    $count = $query->fetch_assoc();
                  ?>
                  <h3><?php echo $count['pelanggan_nama']; ?></h3>

                  <p>Jumlah Pelanggan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <?php 
                    $sql = "select count(*) as nama from user";
                    $query = $koneksi->query($sql);
                    $count = $query->fetch_assoc();
                  ?>
                  <h3><?php echo $count['nama']; ?></h3>

                  <p>Jumlah User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <!-- chart -->
          <div class="box box-succes">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Transaksi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- box body -->
          </div>
          <!-- end chart -->
        </section><br>
      </div>
    </div>
  </div>


<script>
    var ctx = document.getElementById("barChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Jumlah Transaksi", "Jumlah Pakaian","Jumlah Pelanggan","Jumlah User"],
        datasets: [{
          label: '',
          data: [
            <?php 
              $Transaksi = mysqli_query($koneksi,"select * from transaksi where transaksi_id");
              echo mysqli_num_rows($Transaksi);
            ?>,
            <?php 
              $produk = mysqli_query($koneksi,"select * from pakaian where pakaian_id");
              echo mysqli_num_rows($produk);
            ?>,
            <?php 
              $Customer = mysqli_query($koneksi,"select * from pelanggan where pelanggan_id");
              echo mysqli_num_rows($Customer);
            ?>,
            <?php 
              $ukm = mysqli_query($koneksi,"select * from user where user_id");
              echo mysqli_num_rows($ukm);
            ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
</body>
<?php include 'footer.php'; ?>
</html>
<?php } ?>
