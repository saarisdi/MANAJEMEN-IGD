<?php
// Koneksi ke database
$db = \Config\Database::connect();

// Query untuk mengambil data jumlah pasien per bulan
$query = $db->query('SELECT COUNT(*) as total, MONTH(tanggal_masuk) as bulan FROM tbl_masuk GROUP BY MONTH(tanggal_masuk)');

// Inisialisasi array untuk menyimpan data bulan dan jumlah pasien
$bulan = [];
$jumlah_pasien = [];

// Memproses hasil query
foreach ($query->getResult() as $row) {
    $bulan[] = $row->bulan;
    $jumlah_pasien[] = $row->total;
}
?>
<!-- dashboard.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>


<body>
    <!-- Navbar -->
    <?= $this->include('navbar.php') ?>

    <!-- Content -->
    <div class="container mt-4">
        <h2>Jumlah Kasur</h2>
        <div class="row">
            <?php
            // Koneksi ke database
            $db = \Config\Database::connect();

            // Query untuk mengambil data jumlah kasur
            $query = $db->query('SELECT * FROM tbl_kasur');

            // Periksa apakah terdapat data
            if ($query->getNumRows() > 0) {
                // Tampilkan data
                foreach ($query->getResult() as $row) {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Kasur ' . $row->type_kasur . '</h5>';
                    echo '<p class="card-text">Jumlah: ' . $row->jumlah_kasur . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Tidak ada data jumlah kasur.</p>';
            }
            ?>
        </div>
    </div>

    <div class="container mt-4">
        <h2>Jumlah Pasien</h2>
        <?php
        // Koneksi ke database
        $db = \Config\Database::connect();

        // Query untuk mengambil jumlah pasien
        $query = $db->query('SELECT COUNT(*) as ket_masuk FROM tbl_masuk');

        // Periksa apakah terdapat data
        if ($query->getNumRows() > 0) {
            // Ambil data jumlah pasien
            $row = $query->getRow();
            $ket_masuk = $row->ket_masuk;

            // Tampilkan jumlah pasien
            echo '<p>Jumlah pasien: ' . $ket_masuk . '</p>';
        } else {
            echo '<p>Tidak ada data jumlah pasien.</p>';
        }
        ?>
    </div>

    <div class="container mt-4">
        <h2>Pasien Masuk Per Bulan</h2>
        <canvas id="myChart"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($bulan) ?>,
                datasets: [{
                    label: 'Jumlah Pasien',
                    data: <?= json_encode($jumlah_pasien) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date();
            var currentHour = today.getHours();
            var greeting;

            if (currentHour < 12) {
                greeting = "Selamat Pagi";
            } else if (currentHour < 18) {
                greeting = "Selamat Siang";
            } else {
                greeting = "Selamat Malam";
            }

            document.getElementById("greeting").innerText = greeting;
        });
    </script>
</body>

</html>