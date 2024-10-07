<nav class="navbar navbar-expand-lg navbar-dark mb-5">
    <div class="container">

        <a class="navbar-brand" href="<?= BASEURL ?>">
            <strong>
                <i class="fas fa-book"></i>
                Prodi Ilmu Hukum
            </strong>.Sistem Deteksi Plagiarisme

        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> -->
            </ul>
            <span class="navbar-text">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a data-bs-toggle="dropdown" class="nav-link " aria-current="page" href="#">Selamat datang, <?= $_SESSION['name'] ?></a>
                    </li>


                </ul>
            </span>
        </div>
    </div>
</nav>