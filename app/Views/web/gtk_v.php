<?php $this->extend('tamplate/tamplateWeb');  ?>
<?php $this->section('content');  ?>

<?php
$gtks = [
    [
        'nama' => 'Puji Astuti, S.pd',
        'jabatan' => 'Kepala Sekolah',
        'quote' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos explicabo optio, eveniet'
    ],
    [
        'nama' => 'Puji Astuti, S.pd',
        'jabatan' => 'Kepala Sekolah',
        'quote' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos explicabo optio, eveniet'
    ],
    [
        'nama' => 'Puji Astuti, S.pd',
        'jabatan' => 'Kepala Sekolah',
        'quote' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos explicabo optio, eveniet'
    ],
    [
        'nama' => 'Puji Astuti, S.pd',
        'jabatan' => 'Kepala Sekolah',
        'quote' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos explicabo optio, eveniet'
    ],
    [
        'nama' => 'Puji Astuti, S.pd',
        'jabatan' => 'Kepala Sekolah',
        'quote' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos explicabo optio, eveniet'
    ],
    [
        'nama' => 'Puji Astuti, S.pd',
        'jabatan' => 'Kepala Sekolah',
        'quote' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos explicabo optio, eveniet'
    ],
]
?>
<div class="container">
    <div class="isi" style="padding-top: 80px;">
        <h1 class="warna">GTK</h1>
        <hr>
        <div id="carouselExampleIndicators" class="carousel carousel-dark">

            <div class="carousel-inner">
                <?php foreach ($gtks as $gtk) : ?>
                    <div class="carousel-item">
                        <div class="card card-gtk">
                            <div class="img-wrapper">
                                <img src="assets/other/kepsek.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body py-4">
                                <h4 class="card-title name-gtk text-center"><?= $gtk['nama']; ?></h4>
                                <h6 class="text-center"><?= $gtk['jabatan']; ?></h6>
                                <div class="card-text">
                                    <p class="text-center mt-2"><?= $gtk['quote']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<?php $this->endSection();  ?>