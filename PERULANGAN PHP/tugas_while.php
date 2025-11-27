<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkalian 3</title>
</head>
<body>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Operasi</th>
                <th>Hasil</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $angka = 1; // Inisialisasi counter

            // Mulai perulangan while
            while ($angka <= 10) {
                $hasil = 3 * $angka;

                // Cetak baris tabel
                echo "<tr>";
                echo "<td>3 x " . $angka . "</td>";
                echo "<td>" . $hasil . "</td>";
                echo "</tr>";

                $angka++; // Increment counter
            }
            // Akhir perulangan while
            ?>
        </tbody>
    </table>

</body>
</html>
