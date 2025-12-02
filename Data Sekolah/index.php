<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h2>SI Sekolah | Data Siswa </h2>
    <br/>
    <a href="tambah.php">+ Tambah Data</a>
    <br/>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama Siswa</td>
            <td>Alamat</td>
            <td>Agama</td>
            <td>Asal Sekolah</td>
            <td>Opsi</td>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $query = mysqli_query($konek, "SELECT * FROM data_siswa");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['nama_siswa'];?></td>
            <td><?php echo $data['alamat_siswa'];?></td>
            <td><?php echo $data['agama_siswa'];?></td>
            <td><?php echo $data['asal_siswa'];?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['id_siswa']; ?>">Edit</a>
                <a href="hapus.php?id=<?php echo $data['id_siswa']; ?>">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>