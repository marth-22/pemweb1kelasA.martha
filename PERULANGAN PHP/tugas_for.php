<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Tabel PHP</title>
</head>
<body>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nomor Urut</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mulai perulangan for
            for ($i = 1; $i <= 15; $i++) {
                // Cetak baris tabel
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>Ini adalah baris ke-" . $i . "</td>";
                echo "</tr>";
            }
            // Akhir perulangan for
            ?>
        </tbody>
    </table>

</body>
</html>
