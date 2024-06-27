<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold text-uppercase" href="#">Instalasi Gawat Darurat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data
                </a>
                <div class="dropdown-menu" aria-labelledby="dataDropdown">
                    <a class="dropdown-item" href="/datapasien">Data Pasien</a>
                    <a class="dropdown-item" href="/datadokter">Data Dokter Jaga</a>
                    <a class="dropdown-item" href="/dataperawat">Data Perawat Jaga</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/datakasur">Informasi Kasur</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pasienDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Pasien
                </a>
                <div class="dropdown-menu" aria-labelledby="pasienDropdown">
                    <a class="dropdown-item" href="/pasienmasuk">Data Pasien Masuk</a>
                    <a class="dropdown-item" href="/pasienkeluar">Data Pasien Keluar</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kelolauser">Kelola User</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="/about_us">About Us</a>
            </li>
            <li class="nav-item ml-5">
                <a class="nav-link font-weight-bold" href="#">
                    <span id="greeting"></span>, <?= session()->get('nama') ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-danger" href="/logout">Keluar</a>
            </li>
        </ul>
    </div>
</nav>