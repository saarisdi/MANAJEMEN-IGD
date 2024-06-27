<!-- edit_datapasien.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Pasien</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?= $this->include('navbar.php') ?>

    <div class="container mt-4">
        <h2>Edit Data Pasien</h2>
        
        <form action="/update_datapasien/<?= $patient['id'] ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $patient['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur" value="<?= $patient['umur'] ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"><?= $patient['alamat'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="ket_masuk">Keterangan Masuk</label>
                <textarea class="form-control" id="ket_masuk" name="ket_masuk"><?= $patient['ket_masuk'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="ket_kesehatan">Keterangan Kesehatan</label>
                <textarea class="form-control" id="ket_kesehatan" name="ket_kesehatan"><?= $patient['ket_kesehatan'] ?></textarea>
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