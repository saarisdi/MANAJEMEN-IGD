<!-- tambah_datapasienkeluar.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Data Pasien Keluar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?= $this->include('navbar.php') ?>
    <div class="container mt-4">
        <h2>Tambah Data Pasien keluar</h2>
        <form action="/store_pasienkeluar" method="POST">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tanggal_keluar">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
            </div>
            <div class="form-group">
                <label for="jam_keluar">Jam Keluar</label>
                <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" step="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
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