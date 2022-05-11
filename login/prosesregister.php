<?php
require_once('../koneksi/koneksi.php');
//require_once('../models/database.php');
session_start();
//$connection =  new mysqli('localhost', 'root', '', 'belajar');
// $connection =  new mysqli($host, $user, $pass, $database);

if( isset($_POST["daftar"]) ) {

	if( register($_POST) > 0 ) {
		echo "<script>
		alert('Username Baru Berhasil Di Tambahkan.. !');
		document.location.href = 'login.php';
			</script>";//user baru berhasil ditambahkan

		} else {
			echo "<script>
			alert('Harap Coba Lagi.. !');
			document.location.href = 'login.php';
			</script>";//harap coba lagi
		}

	}



	?>

	<?php

	function register($data) {
		global $koneksi;

		// $email = strtolower(stripcslashes($data["email"]));
		$username = strtolower(stripcslashes($data["nm_user"]));
		$level = strtolower(stripcslashes($data["level"]));
		$password = mysqli_real_escape_string($koneksi, $data["password"]);
		$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

	//cek username sudah ada atau belum
		$result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
		if( mysqli_fetch_assoc($result) ){
			echo "<script>
			alert('Username Telah Terdaftar !');
			</script>";//username telah terdaftar
			
			//berhentikan functionnya
			return false;
		}


	//cek konfirmasi password
		if( $password !== $password2) {
			echo "<script>
			alert('Password Tidak Cocok !');
			</script>";//password tidak sesuai
			return false;

		}

	//enkripsi/amankan password cara1
		$password = password_hash($password, PASSWORD_DEFAULT);
	//enskripsi/amankan password cara2
	//$password = md5($password);
	//var_dump($password); die;
		
	//tambahkan user baru baru ke database

		mysqli_query($koneksi, "INSERT INTO users VALUES('','$username','$password','$level')");

		return mysqli_affected_rows($koneksi);

	}



	?>