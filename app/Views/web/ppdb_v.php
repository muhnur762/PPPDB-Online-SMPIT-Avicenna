<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title  ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/stylePpdb.css'); ?>">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-transparant position-absolute w-100" style="z-index: 1000;">
        <div class="container px-5">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/other/logoavc.png'); ?>" alt="Logo" width="40" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto ">
                    <a class="nav-link fw-semibold" aria-current="page" href="#timeline">Time Line</a>
                    <a class="nav-link fw-semibold" href="#">Persyaratan</a>
                    <a class="nav-link fw-semibold" href="#">Brosur</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="banner">
        <div class="content-banner d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md p-5 d-flex align-items-center" data-aos="fade-right">
                        <div>
                            <h1 class="text text-center text-md-start">PORTAL PPDB</h1>
                            <h1 class="text text-center text-md-start">SMPIT AVICENNA</h1>
                            <h3 class="text-center text-md-start">TA <?= date('Y'); ?>/<?= date('Y', strtotime("+1 year", strtotime(date("Y"))));; ?></h3>
                            <div class="d-block d-block mx-auto mx-md-0" style="width: fit-content;">
                                <a href="<?= base_url('admin'); ?>" class="btn  mybtn btn-lg rounded-pill px-5 mt-5">LOGIN</a>
                                <a class="d-block text-center mt-3 text-decoration-none" href="<?= base_url(''); ?>"><i class="bi bi-arrow-left-short"></i> Back To Website</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md" data-aos="fade-left">
                        <img src="/assets/other/siswa.png" class="gambar" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid p-0" style="height:1000px">
        <div class="wave">
            <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 160" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                        <stop stop-color="rgba(238, 238, 238, 1)" offset="0%"></stop>
                        <stop stop-color="rgba(238, 238, 238, 1)" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,96L48,80C96,64,192,32,288,29.3C384,27,480,53,576,74.7C672,96,768,112,864,101.3C960,91,1056,53,1152,34.7C1248,16,1344,16,1440,37.3C1536,59,1632,101,1728,117.3C1824,133,1920,123,2016,104C2112,85,2208,59,2304,40C2400,21,2496,11,2592,16C2688,21,2784,43,2880,48C2976,53,3072,43,3168,50.7C3264,59,3360,85,3456,80C3552,75,3648,37,3744,37.3C3840,37,3936,75,4032,77.3C4128,80,4224,48,4320,34.7C4416,21,4512,27,4608,34.7C4704,43,4800,53,4896,53.3C4992,53,5088,43,5184,56C5280,69,5376,107,5472,114.7C5568,123,5664,101,5760,77.3C5856,53,5952,27,6048,26.7C6144,27,6240,53,6336,56C6432,59,6528,37,6624,26.7C6720,16,6816,16,6864,16L6912,16L6912,160L6864,160C6816,160,6720,160,6624,160C6528,160,6432,160,6336,160C6240,160,6144,160,6048,160C5952,160,5856,160,5760,160C5664,160,5568,160,5472,160C5376,160,5280,160,5184,160C5088,160,4992,160,4896,160C4800,160,4704,160,4608,160C4512,160,4416,160,4320,160C4224,160,4128,160,4032,160C3936,160,3840,160,3744,160C3648,160,3552,160,3456,160C3360,160,3264,160,3168,160C3072,160,2976,160,2880,160C2784,160,2688,160,2592,160C2496,160,2400,160,2304,160C2208,160,2112,160,2016,160C1920,160,1824,160,1728,160C1632,160,1536,160,1440,160C1344,160,1248,160,1152,160C1056,160,960,160,864,160C768,160,672,160,576,160C480,160,384,160,288,160C192,160,96,160,48,160L0,160Z"></path>
            </svg>
        </div>
        <div class="content-timeline" id="timeline" data-aos="fade-up">
            <h1 class="text-center">Time Line</h1>

            <div class="timeline">
                <div class="outer">
                    <?php foreach ($ppdb as $data) : ?>
                        <div class="card-timeline">
                            <div class="info">
                                <h3 class="title"><?= $data['judul']; ?></h3>
                                <div><?= $data['isi']; ?> </div>
                            </div>
                        </div>
                    <?php endforeach;  ?>

                </div>
            </div>

        </div>
    </div>
    <div class="btnwa">
        <a href="https://wa.me/62895330944736" target="_blank"><img src="https://media.tenor.com/Spdlu7aT88AAAAAj/wp.gif" width="80" height="80" alt=""></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>


</html>