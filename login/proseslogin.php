

<?php 
require_once('../koneksi/koneksi.php');
//require_once('../models/database.php');
session_start();
//$connection =  new mysqli('localhost', 'root', '', 'belajar');
// $connection =  new mysqli($host, $user, $pass, $database);

//if(isset($_POST['login']))
//{
	
	//$username = $_POST['nm_user'];
	//$password = $_POST['password'];
	//$ambil = $connection->query("SELECT * FROM users WhERE nama_user='$username' AND password='$password'");
	//$yangcocok = $ambil->num_rows;
	//if ( $yangcocok === 1)
	//{
		//$_SESSION['adm']=$ambil->fetch_assoc();
		
		//echo "<div class='alert alert-info'>Login Success</div>";
		//echo "<meta http-equiv='refresh' content='1;url=../admin/index.php'>";
		//}
		//else
		//{
			//echo "<div class='alert alert-danger'>Login Failed</div>";
			//echo "<meta http-equiv='refresh' content='1;url=login.php'>";
			//echo "<meta http-equiv='refresh' content='1;url=../admin/index.php'>";
			//}
			//}
			
			
			
	if(isset($_POST['login']))
	{
		
		$username = $_POST['nm_user'];
		$password = $_POST['password'];
		$ambil = $koneksi->query("SELECT * FROM users WHERE username = '$username'");
		$yangcocok = $ambil->num_rows;
		
		if ( $yangcocok === 1)
		{
			$row = $ambil->fetch_assoc();
			// $username = $row["username"];
			// $level = $row['level'];

			$data = [
				'id_users'=> $row['id_users'], 
				'username' => $row['username'], 
				'password' => $row['password'], 
				'level' => $row['level']
			];


			if ($data['username'] <> '') { //artinya jika usernamenya tidak sama dengan kosong. bisa diganti dengan !== artinya juga sama jika tidak sama dengan/identik.
				//  session_start();
				$_SESSION['user'] = $data['username'];// data username diberikan session untuk mengetahui namanya
			}
			if ($data['level'] == '1') {
				$_SESSION['administrator'] = 'TRUE';
			}
			if ($data['level'] == '2'){
				$_SESSION['rw'] = 'TRUE';
			}
			if ($data['level'] == '3') {
				$_SESSION['rt'] = 'TRUE';
			}
			
			//$_SESSION['adm'] = $row ; //yang ini salah karna cuma mendapatkan username/ dengan menggunakan username saja tetep bisa masuk ke sistem
			if(password_verify($password, $data["password"]))
			{
				$_SESSION['adm'] = $data ;//$row pada baris password_verify/($ambil->fetch_assoc()) diberikan session agar password yg benar diizinkan masuk ke sistem

					echo "<script>alert('Login Sukses')</script>";
					echo "<div class='alert alert-info'>Login Success</div>";
					echo "<meta http-equiv='refresh' content='1;url=../admin/?page=dashboard'>";
				}
			else
			{
				//pasword salah tidak diizinkan masuk
				echo "<script>alert('Password/Username Salah')</script>";
				echo "<div class='alert alert-info'>Login Failed</div>";
				echo "<meta http-equiv='refresh' content='1;url=../admin/?page=dashboard'>";
			}
			
		}
		else
		{
			//username tidak ada di db
			echo "<script>alert('Password/Username Salah')</script>";
			echo "<div class='alert alert-info'>Login Failed</div>";
			echo "<meta http-equiv='refresh' content='1;url=../admin/?page=dashboard'>";
	}

}




if(isset($_GET['logout']))
{
	
	
	include "logout.php";
	
	
}

?>
