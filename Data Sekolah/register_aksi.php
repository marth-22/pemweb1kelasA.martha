<?php
include 'koneksi.php';

$username = $_POST['username'];
$email    = $_POST['email'];
$password = hash('sha256', $_POST['password']);

mysqli_query($koneksi, "INSERT INTO users (username, email, password)
                        VALUES ('$username', '$email', '$password')");

header("location:index.php");
?>