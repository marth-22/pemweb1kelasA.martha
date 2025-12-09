<?php
$server = "localhost";
$user = "username_database";
$pass = "password_database";
$database = "nama_database";
$icon = mysqli_connect($server, $user, $pass, $database);
if (!$icon) {
    die("koneksi ke database gagal: " . mysqli_connect_error());
}
?>