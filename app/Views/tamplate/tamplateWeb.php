<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url("/assets/css/styleWeb.css"); ?>">
    <!-- icon bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- icon fontaawsome -->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="body">
    <div class="wrap-loader">
        <span class="loader"></span>
    </div>
    <!-- start nav -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-center" href="/admin">
                <img src="<?= base_url("assets/other/logoavc.png"); ?>" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-1">
                SMPIT AVICENNA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people"></i> About Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile">Profile Singkat</a></li>
                            <li><a class="dropdown-item" href="/sambutan">Sambutan Kepala Sekolah</a></li>
                            <li><a class="dropdown-item" href="/visimisi">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="/fasilitas">Fasilitas</a></li>
                            <li><a class="dropdown-item" href="/ekstrakulikuler">Ekstrakulikuler</a></li>
                            <li><a class="dropdown-item" href="/#program">Program unggulan</a></li>
                            <li><a class="dropdown-item" href="/gtk">GTK</a></li>
                            <li><a class="dropdown-item" href="#">Sekolah Kita</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-newspaper"></i> News
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/news">Berita</a></li>
                            <li><a class="dropdown-item" href="/pengumuman">Pengumuman</a></li>
                            <li><a class="dropdown-item" href="/prestasi">Prestasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-images"></i> Gallery
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/foto">Galeri Foto</a></li>
                            <li><a class="dropdown-item" href="/vidio">Galeri Vidio</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><i class="bi bi-telephone"></i> Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn ms-2 text-light " style="width: 100px; background-color:#4c4d99;" href="/ppdb">PPDB</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->

    <?php $this->renderSection('content') ?>

    <div class="upbox" id="upbox">
        <a href="#" class="btn shadow" style="background-color:#4c4d99;"> <i class="bi bi-arrow-up-short text-light"></i></a>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="container px-md-0 px-5">
            <div class="row">
                <div class="col mb-3">
                    <h3 class="fw-bold">SMPIT AVICENNA</h3>
                    <p>Mulia Dalam Akhlak Unggul Dalam Prestasi</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 px-4 mb-5">
                    <h5>Addres</h5>
                    <p> Vila Indah Permai Blok G26 Teluk Pucung, Teluk Pucung, Kec. Bekasi Utara, Kota Bekasi Prov. Jawa Barat</p>
                    <br>
                    <h5>Contact</h5>
                    <a href="" class="d-block text-decoration-none text-light nav-footer">Telp : 0987-097-887</a>
                    <a href="" class="d-block text-decoration-none text-light nav-footer">Fax : 0987654335</a>
                    <a href="" class="d-block text-decoration-none text-light nav-footer">email : email.gmail.com</a>


                </div>
                <div class="col-lg-4 px-4 mb-5">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <h5>About Us</h5>
                            <a href="/profile" class="d-block text-decoration-none text-light nav-footer">Profile Singkat</a>
                            <a href="/sambutan" class="d-block text-decoration-none text-light nav-footer">Sambutan Kepala sekolah</a>
                            <a href="/visimisi" class="d-block text-decoration-none text-light nav-footer">Visi Misi</a>
                            <a href="/program" class="d-block text-decoration-none text-light nav-footer">Program Unggulan</a>
                            <a href="/fasilitas" class="d-block text-decoration-none text-light nav-footer">Fasilitas</a>
                            <a href="ekstrakulikuler" class="d-block text-decoration-none text-light nav-footer">Ekstrakulikuler</a>
                        </div>
                        <div class="col-md-6">
                            <h5>Link</h5>
                            <a href="" class="d-block text-decoration-none text-light nav-footer">Sekolah Kita</a>
                            <a href="" class="d-block text-decoration-none text-light nav-footer">Lorem, ipsum.</a>
                            <a href="/ppdb" class="d-block text-decoration-none text-light nav-footer">PPDB Online</a>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 mb-3">
                    <h5 class="">Maps</h5>
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.925247396763!2d107.0262712!3d-6.2000555!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9baa53be5925d975!2sAVICENNA%20FOUNDATION!5e0!3m2!1sen!2sid!4v1680189153682!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                    <span>Copyright <i class="bi bi-heart-fill text-danger"></i> KKP SMPIT AVICENNA <?= date('Y'); ?></span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 200,
        });
    </script>

    <!-- my js -->
    <script src="<?= base_url("assets/js/web.js"); ?>"></script>
</body>

</html>