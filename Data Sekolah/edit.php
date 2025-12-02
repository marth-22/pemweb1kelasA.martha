<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h2>SI Sekolah | Edit Data Siswa </h2>
    <br/>
    <a href="index.php">Kembali</a>
    <h3>Edit Data Siswa</h3>

<?php
    include 'koneksi.php';
    $id = $_GET ['id'];
    $query = mysqli_query($konek, "SELECT * FROM data_siswa where id_siswa='$id'");
    while ($data = mysqli_fetch_array($query)){
        ?>
    <form method="post" action="edit_aksi.php">
        <table>
            <tr>
                <td>Nama Siswa</td>
                <td><input type="hidden" name="id" value="<?php echo $data['id_siswa']; ?>">
                <td><input type="text" name="nama" value="<?php echo $data['nama_siswa']; ?>">
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $data['alamat_siswa']; ?>">
            </tr>
            <tr>
                <td>Agama</td>
                <td><input type="text" name="agama" value="<?php echo $data['agama_siswa']; ?>">
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td><input type="text" name="asal" value="<?php echo $data['asal_siswa']; ?>">
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN"></td>
            </tr>
        </table
    </form>
    <?php
    }
    ?>

</body>
</html>