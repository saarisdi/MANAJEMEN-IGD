<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <title>About Us</title>
    <!-- Tautan ke file JavaScript -->
    <script src="/js/about_us.js"></script>
    <!-- Tautan ke file CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <?= $this->include('navbar.php') ?>
    <h1>About Us</h1>
    <div class="developers">
        <?php foreach ($developers as $developer): ?>
            <div class="developer">
                <img src="<?= base_url('images/' . $developer['image']) ?>" alt="<?= $developer['name'] ?>">
                <h3><?= $developer['name'] ?></h3>
                <p><?= $developer['bio'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <footer>
        <div class="company-info">
            <p>Informatika</p>
            <p>Kelas C</p>
        </div>
        <p>&copy; <?= date('Y') ?> Universitas Jenderal Achmad Yani. All rights reserved.</p>
    </footer>

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
</body>
</html>
