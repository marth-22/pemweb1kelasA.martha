<?php
<table>
    <thead>
        <tr>
            <th>Nomor Urut</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Mulai perulangan for di sini
        for ($i = 1; $i <= 15; $i++) {
            // Cetak baris tabel di sini
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>Ini adalah baris ke-" . $i . "</td>";
            echo "</tr>";
        }
        // Akhir perulangan for
        ?>
    </tbody>
</table>
?>