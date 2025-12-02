<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama_siswa'];
$alamat = $_POST['alamat_siswa'];
$agama = $_POST ['agama_siswa'];
$asal = $_POST['asal_siswa'];

// menginput data ke database
mysqli_query($konek, "insert into data_siswa values('','$nama', '$alamat', '$agama', '$asal')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>