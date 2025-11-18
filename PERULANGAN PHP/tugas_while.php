<table>
    <thead>
        <tr>
            <th>Operasi</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $angka = 1; // Inisialisasi counter

        // Mulai perulangan while di sini
        while ($angka <= 10) {
            $hasil = 3 * $angka;
            // Cetak baris tabel di sini
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