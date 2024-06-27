<!-- edit_kelolauser.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kelola Kasur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar.php') ?>

    <div class="container mt-4">
        <h2>Edit admin</h2>

        <form action="/update_kelolauser/<?= $username['id'] ?>" method="POST">
            <div class="form-group">
                <label for="nama">nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $username['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="no_telp">no telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $username['no_telp'] ?>">
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