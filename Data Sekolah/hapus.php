<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_siswa'];

// menghapus data dari database
mysqli_query($konek, "delete from data_siswa where id_siswa='$id'");

// mengalihkan halaman kembali ke index.php
header("location: index.php");

?>