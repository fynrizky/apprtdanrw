<?php
require_once('../../koneksi/koneksi.php');

$iduser = $_POST['iduser'];
$username = $koneksi->real_escape_string($_POST['username']);
$password = $koneksi->real_escape_string($_POST['password']);
$password2 = $koneksi->real_escape_string($_POST['password2']);
$level = $koneksi->real_escape_string($_POST['level']);

if ($password !== $password2) {
    echo "<script>alert('Password tidak sesuai');</script>";
    echo "<script>window.location.href='?page=users';</script>";

    return false;
}

$query = $koneksi->query("SELECT * FROM users WHERE username = '$username' AND id_users != '$iduser'");
if ($query->num_rows > 0) {
    echo "<script>alert('Username Sudah Terpakai');</script>";
    echo "<script>window.location.href='?page=users';</script>";
    return false;
} else {
    echo "<script>alert('Username Berhasil Di Ubah');</script>";
    echo "<script>window.location.href='?page=users';</script>";
    // return TRUE;
}


$query = $koneksi->query("SELECT * FROM users WHERE id_users = '$iduser'");

// if ($password !== $password2) {
//     echo "<script>alert('Password tidak sesuai');</script>";
//     echo "<script>window.location.href='?page=users';</script>";

//     return false;
// }

//jika kosong
if (empty($password)) {
    $data = $query->fetch_object();
    $password = $data->password;
} else { //jika tidak

    $password = password_hash($password, PASSWORD_DEFAULT);
}


$koneksi->query("UPDATE users SET username = '$username', password ='$password', level = '$level' WHERE id_users = '$iduser'");
echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=users';</script>";
 