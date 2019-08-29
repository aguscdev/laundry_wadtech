<?php

// menghubungkan php dengan koneksi database
include '../config/koneksi.php';
session_start();

if ($_SESSION['username']=='') {
	header('location:login.php');
}else{
	$user = $_SESSION["username"];
	$user_id = $_SESSION["user_id"];	
	$level = $_SESSION["level"];

	// var_dump($user,$user_id,$level);

	if ($level =='ADMIN') {
		header('location:../home/home.php');
	}
	elseif ($level=='USER') {
		header('location:../home/home.php');
	}
}

?>