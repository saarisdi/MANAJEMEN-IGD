<!-- datakasur.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Informasi Kasur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?= $this->include('navbar.php') ?>

    <!-- Content -->
    <div class="container mt-4">
        <h2>Informasi Kasur</h2>
        <!-- Tampilkan pesan sukses -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <a href="/tambah_datakasur" class="btn btn-primary mb-3 float-right">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Type Kasur</th>
                    <th>Jumlah Kasur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $db = \Config\Database::connect();

                // Query untuk mengambil data pasien
                $query = $db->query('SELECT * FROM tbl_kasur');

                // Periksa apakah terdapat data
                if ($query->getNumRows() > 0) {
                    // Tampilkan data pasien
                    $no = 1;
                    foreach ($query->getResult() as $row) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . $row->id . '</td>';
                        echo '<td>' . $row->type_kasur . '</td>';
                        echo '<td>' . $row->jumlah_kasur . '</td>';
                        echo '<td>';
                        echo '<a href="/edit_datakasur/' . $row->id . '" class="btn btn-success btn-sm">Edit</a>';
                        echo '<a href="/delete_datakasur/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Tidak ada Informasi Kasur.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

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