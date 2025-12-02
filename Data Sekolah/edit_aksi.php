<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_siswa'];
$nama = $_POST['nama_siswa'];
$alamat = $_POST['alamat_siswa'];
$agama = $_POST ['agama_siswa'];
$asal = $_POST['asal_siswa'];

// menginput data ke database
mysqli_query($konek, "update data_siswa set nama ='$nama', alamat ='$alamat', agama ='$agama', asal ='$asal', where id_siswa ='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>