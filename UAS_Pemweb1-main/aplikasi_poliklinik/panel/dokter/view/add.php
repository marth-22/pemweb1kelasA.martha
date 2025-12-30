<?php 
require_once '../../Control.php';

$query = "SELECT * FROM poliklinik";
$poliklinik = data($query);

if(isset($_POST['tambah'])){
	$nama 			= $_POST['nama'];
	$jk 			= $_POST['jk'];
	$alamat 		= $_POST['alamat'];
	$telepon 		= $_POST['telepon'];
	$jmpraktek 		= $_POST['jmpraktek'];
	$tarif 			= $_POST['tarif'];
	$poli 			= $_POST['poli'];

	// Validasi sederhana
    if( !empty($nama) && !empty($alamat) && !empty($telepon) && !empty($tarif) && !empty($poli) ){
        $query = "INSERT INTO dokter (namadkt, jk, alamat, telepon, jmpraktek, tarif, id_poli) VALUES 
                  ('$nama', '$jk', '$alamat', '$telepon', '$jmpraktek', '$tarif', '$poli')";
        
        $insert = data($query);
        if($insert){
            echo "<script>alert('Data Berhasil Ditambah'); window.location='index.php';</script>";
        }
    }
}
?>

<?php require_once 'view/view.php'; headku(); ?>

<div class="bungkus">
    <?php sideku(); ?>
    <div class="main">
        <div class="isimain">
            <div class="back">
                <a href="index.php" class="tmbl biru">Kembali</a>
            </div>

            <div class="dokter">
                <div class="form-abu">
                    <div class="head-form">
                        <h2>Tambah Data Dokter</h2>
                    </div>
                    <form action="" method="post">
                        <label>Nama Dokter</label>
                        <input type="text" name="nama" class="full" placeholder="Nama Dokter" required>

                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jk" value="Laki-laki" checked> Laki-laki
                        <input type="radio" name="jk" value="Perempuan"> Perempuan <br><br>

                        <label>Spesialis Poli</label>
                        <select name="poli" class="f50">
                            <?php while($row = mysqli_fetch_assoc($poliklinik)){ ?>
                                <option value="<?= $row['id_poli']; ?>"><?= $row['poli']; ?></option>
                            <?php } ?>
                        </select>

                        <label>Alamat</label>
                        <textarea name="alamat" class="full" required></textarea>

                        <label>Telepon</label>
                        <input type="number" class="f50" name="telepon" required>

                        <label>Waktu Praktek</label>
                        <input type="text" class="f50" name="jmpraktek" placeholder="Contoh: 08:00 - 14:00" required>

                        <label>Tarif</label>
                        <input type="number" class="f50" name="tarif" required>

                        <label></label>
                        <input type="submit" value="Tambah Data" class="hijau" name="tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php footerku(); ?>
</div>
