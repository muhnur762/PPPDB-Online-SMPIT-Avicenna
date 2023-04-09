<?php $this->extend('tamplate/tamplateweb'); ?>

<?php $this->section('content');  ?>

<div class="isi" style="padding-top: 80px;">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-2">
                <h1 class="warna"><?= $heading; ?></h1>
            </div>
            <div class="col-lg-4">
                <div class="input-group mb-3 mysearch ">
                    <input type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="button-addon2">
                    <button class="" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
        <hr>

        <div class="blog-card">
            <div class="row d-flex justify-content-center">
                <?php foreach ($blog as $data) :  ?>
                    <div class="col-lg-3 col-md-6 d-flex justify-content-center mb-4">
                        <a href="news/<?= $data['slug']; ?>" class="myhover">
                            <div class="card mycard shadow h-100">
                                <img src="assets/other/<?= $data['cover']; ?>" class="card-img-top miniImg" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['judul']; ?></h5>
                                    <p class="card-ket"><?= $data['penulis']; ?> | <?= date('d m Y', strtotime($data['created_at'])); ?></p>
                                    <div class="card-text"><?= $data['isi']; ?></div>
                                </div>
                                <div class="kategori">
                                    <p><?= $data['kategori']; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach;  ?>
            </div>
        </div>

    </div>

</div>
<?php $this->endSection()  ?>
btn btn-outline-secondary