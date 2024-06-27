<!-- kelolauser.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Informasi Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?= $this->include('navbar.php') ?>

    <!-- Content -->
    <div class="container mt-4">
        <h2>Informasi Admin</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>No_Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $db = \Config\Database::connect();

                // Query untuk mengambil data admin
                $query = $db->query('SELECT * FROM tbl_admin');

                // Periksa apakah terdapat data
                if ($query->getNumRows() > 0) {
                    // Tampilkan data admin
                    $no = 1;
                    foreach ($query->getResult() as $row) {
                        echo '<tr>';
                        echo '<td>' . $row->id . '</td>';
                        echo '<td>' . $row->username . '</td>';
                        echo '<td>' . $row->nama . '</td>';
                        echo '<td>' . $row->password . '</td>';
                        echo '<td>' . $row->no_telp . '</td>';
                        echo '<td>';
                        echo '<a href="/edit_kelolauser/' . $row->id . '" class="btn btn-success btn-sm">Edit</a>';
                        echo '<a href="/delete_kelolauser/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">Tidak ada Informasi admin.</td></tr>';
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