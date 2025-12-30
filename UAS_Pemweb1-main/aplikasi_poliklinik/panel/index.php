<?php 
require_once 'view/view.php'; 
require_once '../Control.php';

if(!isset($_SESSION['user']) ){
    header('Location: ../index.php');
}

// 1. Statistik Utama (Data Box)
$total_dokter = mysqli_fetch_assoc(data("SELECT COUNT(*) as total FROM dokter"))['total'];
$total_pasien = mysqli_fetch_assoc(data("SELECT COUNT(*) as total FROM pasien"))['total'];
$total_poli   = mysqli_fetch_assoc(data("SELECT COUNT(*) as total FROM poliklinik"))['total'];
$total_rev    = mysqli_fetch_assoc(data("SELECT SUM(total_pembayaran) as total FROM pembayaran"))['total'] ?? 0;

// 2. Data Grafik 1: Distribusi Pasien per Poliklinik (Popularitas)
$res_populer = data("SELECT poli, COUNT(*) as jumlah FROM pendaftaran GROUP BY poli");
$label_poli = [];
$data_poli  = [];
while($p = mysqli_fetch_assoc($res_populer)){
    $label_poli[] = $p['poli'];
    $data_poli[]  = $p['jumlah'];
}

// 3. Data Grafik 2: Pendapatan per Poliklinik (Keuangan)
$res_rev_poli = data("SELECT jenis_poli, SUM(total_pembayaran) as total FROM pembayaran GROUP BY jenis_poli");
$label_rev = [];
$data_rev  = [];
while($r = mysqli_fetch_assoc($res_rev_poli)){
    $label_rev[] = $r['jenis_poli'];
    $data_rev[]  = $r['total'];
}

headku(); 
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .dashboard-info { display: flex; justify-content: space-between; flex-wrap: wrap; margin-top: 20px; }
    .box { width: 24%; padding: 20px; color: #fff; border-radius: 8px; margin-bottom: 20px; }
    .box h1 { font-size: 1.5em; margin: 10px 0; }
    .box p { font-size: 0.8em; font-weight: bold; opacity: 0.9; }
    
    .bg-biru { background: #142b6f; }
    .bg-hijau { background: #00bf1d; }
    .bg-kuning { background: #ffd620; color: #555 !important; }
    .bg-ungu { background: #6f42c1; }

    .chart-row { display: flex; justify-content: space-between; margin-top: 20px; }
    .chart-box { width: 49%; background: #fff; padding: 20px; border: 1px solid #eee; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
    .chart-box h3 { margin-bottom: 20px; color: #444; text-align: center; font-size: 1.1em; border-bottom: 1px solid #f1f1f1; padding-bottom: 10px; }
</style>

<div class="bungkus">
    <?php sideku(); ?>
    <div class="main">
        <div class="isimain"> 
            
            <div style="background: #fff; padding: 15px; border-radius: 8px; border-bottom: 3px solid #ffd620; margin-bottom: 20px;">
                <h2 style="color: #142b6f;">Dashboard Analitik Poliklinik</h2>
                <p style="color: #888; font-size: 0.9em;">Visualisasi data berdasarkan transaksi dan pendaftaran real-time.</p>
            </div>

            <div class="dashboard-info">
                <div class="box bg-biru">
                    <p>TOTAL DOKTER</p>
                    <h1><?= $total_dokter; ?> Orang</h1>
                </div>
                <div class="box bg-hijau">
                    <p>TOTAL PASIEN</p>
                    <h1><?= $total_pasien; ?> Orang</h1>
                </div>
                <div class="box bg-kuning">
                    <p>POLIKLINIK</p>
                    <h1><?= $total_poli; ?> Unit</h1>
                </div>
                <div class="box bg-ungu">
                    <p>TOTAL PENDAPATAN</p>
                    <h1>Rp <?= number_format($total_rev, 0, ',', '.'); ?></h1>
                </div>
            </div>

            <div class="chart-row">
                <div class="chart-box">
                    <h3>Penyebaran Pasien per Poli</h3>
                    <div style="height: 300px;">
                        <canvas id="chartPiePoli"></canvas>
                    </div>
                </div>

                <div class="chart-box">
                    <h3>Pendapatan per Poliklinik</h3>
                    <div style="height: 300px;">
                        <canvas id="chartBarRev"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Warna Palette untuk Grafik
    const colors = ['#142b6f', '#00bf1d', '#ffd620', '#6f42c1', '#eb3838', '#007bff', '#fd7e14'];

    // 1. Chart Pie Pasien
    new Chart(document.getElementById('chartPiePoli'), {
        type: 'pie',
        data: {
            labels: <?= json_encode($label_poli); ?>,
            datasets: [{
                data: <?= json_encode($data_poli); ?>,
                backgroundColor: colors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // 2. Chart Bar Pendapatan
    new Chart(document.getElementById('chartBarRev'), {
        type: 'bar',
        data: {
            labels: <?= json_encode($label_rev); ?>,
            datasets: [{
                label: 'Total Rupiah',
                data: <?= json_encode($data_rev); ?>,
                backgroundColor: '#142b6f',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true, ticks: { callback: function(value) { return 'Rp ' + value.toLocaleString(); } } }
            },
            plugins: { legend: { display: false } }
        }
    });
</script>

<?php footerku(); ?>