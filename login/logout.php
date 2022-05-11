<?php
// session_start(); session_start();nya sudah ada di proseslogin.php

if (!isset($_SESSION['adm'])) 
{
	echo "<script>alert('Anda Harus Login..!');</script>";  
	echo "<script>location='../login/login.php';</script>";
	exit();
		  //header('location:login/login.php');
}


session_destroy();
echo "<script>alert('Anda telah Keluar');</script>";
echo  "<script>location='../admin/index.php';</script>";

?>