<?php 
session_start();
// menghubungkan dengan koneksi
include '../config/koneksi.php';
if($_POST['submit']){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$password				= $_POST['password'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		
		$password	= md5($password);
		$cek 			= $koneksi->query("SELECT `password` FROM user WHERE `password`='$password'");
		
		if($cek->num_rows){
			if(strlen($password_baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					$password_baru 	= md5($password_baru);
					$user_id		= $_SESSION['user_id']; //ini dari session saat login
					
					$update 		= $koneksi->query("UPDATE user SET `password`='$password_baru' WHERE `user_id`='$user_id'");
					if($update){
						//kondisi jika proses query UPDATE berhasil
						// echo 'Password berhasil di rubah';
						echo "<script>alert('Password berhasil di rubah');window.location='v_ganti_password.php?pesan=oke';</script>";
					}else{
						//kondisi jika proses query gagal
						echo "<script>alert('Gagal merubah password');window.location='v_ganti_password.php';</script>";
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					echo "<script>alert('Konfirmasi password tidak cocok');window.location='v_ganti_password.php';</script>";
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
				echo "<script>alert('Minimal password baru adalah 5 karakter');window.location='v_ganti_password.php?pesan=oke';</script>";
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			// echo 'Password lama tidak cocok';
			echo "<script>alert('Password lama tidak cocok');window.location='v_ganti_password.php';</script>";
		}
	}
?>