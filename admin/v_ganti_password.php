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
				<?php 
					?>	
					<div class="panel panel-default">
            <div class="panel-heading">Ganti Password</div>
              <div class="panel-body">		
							<form method="post" action="action_ganti_password.php">
									<div class="form-group">
										<label>Masukkan Password Lama</label>
										<input type="password" class="form-control" name="password" id="password" required>
									</div>

									<div class="form-group">
										<label>Masukkan Password Baru</label>
										<input type="password" class="form-control" name="password_baru" id="password_baru" required>
									</div>	

									<div class="form-group">
										<label>konfirmasi Password</label>
										<input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" required>
									</div>
									<input type="submit" name="submit" class="btn btn-primary" value="Ganti Password">				
								</form>
							</div>
						</div>
				</select><br/>
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