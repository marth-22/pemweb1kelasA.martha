<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$agama = $_POST ['agama'];
$asal = $_POST['asal'];

// menginput data ke database
mysqli_query($konek, "update siswa set nama ='$nama', alamat ='$alamat', agama ='$agama', asal ='$asal')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>