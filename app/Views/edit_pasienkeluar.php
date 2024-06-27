<!-- edit_pasienkeluar.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data pasien keluar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar.php') ?>

    <div class="container mt-4">
        <h2>Edit Data pasien keluar</h2>
        
        <form action="/update_pasienkeluar/<?= $patientin['id'] ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $patientin['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_keluar">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?= $patientin['tanggal_keluar'] ?>">
            </div>
            <div class="form-group">
                <label for="jam_keluar">Jam Keluar</label>
                <input type="time" class="form-control" id="jam_keluar" name="jam_keluar"  step="1" value="<?= $patientin['jam_keluar'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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