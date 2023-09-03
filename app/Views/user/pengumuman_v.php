<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container">
            <a class="navbar-brand d-block mx-auto py-3" href="#">
                <img src="<?= base_url('assets/other/logoavc.png'); ?>" alt="Bootstrap" width="100" height="100">
            </a>
        </div>
    </nav>
    <?php
    if ($pengumuman['keterangan'] == 'Lulus' && $pengumuman['status'] == '2') {
    ?>
        <div class="bg-info">
            <h1 class="text-light text-center px-1 py-3">SELAMAT ANDA DINYATAKAN LULUS</h1>
        </div>
    <?php
    } else if ($pengumuman['keterangan'] == 'Cadangan' && $pengumuman['status'] == '2') {
    ?>
        <div class="bg-warning">
            <h1 class="text-light text-center px-1 py-3">CADANGAN</h1>
        </div>
    <?php
    } else {
    ?>
        <div class="bg-danger">
            <h1 class="text-light text-center px-1 py-3">TETAP SEMANGAT DAN JANGAN MENYERAH!</h1>
        </div>
    <?php
    }
    ?>

    <div class="container">
        <?php if (empty($pengumuman['nama'])) {  ?>
            <div class="row d-flex align-items-center mt-5">
                <div class="col">
                    <h1 class="text-center">Belum Mengisi Formulir!</h1>
                </div>
            </div>
        <?php } else {  ?>
            <div class="row d-flex align-items-center mt-5">
                <div class="col-md-4">
                    <img class="d-block mx-auto" alt='testing' src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=goole.com&choe=UTF-8' />
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-6">
                            <h4><b>ID</b></h4>
                        </div>
                        <div class="col-6">
                            <h4>: #227<?= date('ymd', strtotime($pengumuman['created_at'])) . $pengumuman['id_daftar'] ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4><b>NAMA</b></h4>
                        </div>
                        <div class="col-6">
                            <h4>: <?= $pengumuman['nama']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4><b>TTL</b></h4>
                        </div>
                        <div class="col-6">
                            <h4>: <?= $pengumuman['tmp_lahir'] . ", " . date('d M Y', strtotime($pengumuman['tgl_lahir'])) ?></h4>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4><b>ASAL SEKOLAH</b></h4>
                        </div>
                        <div class="col-6">
                            <h4>: <?= $pengumuman['nama_skl']; ?></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <p>Anda dapat mengurus administrasi selanjutnya di Tata Usaha SMPIT Avicenna</p>
                        </div>

                    </div>
                </div>
            </div>
        <?php }  ?>
        <div class="row mb-md-0" style="margin-bottom: 100px;">
            <div class="col bg-dange d-flex justify-content-center">
                <a href="<?= base_url('logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>