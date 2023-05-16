<?php $this->extend('tamplate/tamplateweb'); ?>

<?php $this->section('content');  ?>

<div class="isi" style="padding-top: 80px;">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-2">
                <h1 class="warna"><?= $heading; ?></h1>
            </div>
            <div class="col-md-4">
                <form action="" method="get">
                    <div class="input-group mb-3 mysearch ">
                        <input type="text" class="form-control" placeholder="Cari Judul" aria-label="search" aria-describedby="button-addon2" name="keyword">
                        <button class="" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <hr>

        <div class="blog-card">
            <div class="row d-flex justify-content-center">
                <?php if (empty($blog)) { ?>
                    <img src="<?= base_url('/assets/other/notfound.png'); ?>" class="notfound" alt="Not Found">
                <?php } else { ?>
                    <?php foreach ($blog as $data) :  ?>
                        <div class="col-lg-3 col-md-6 d-flex justify-content-center mb-4 px-5 px-md-3 px-lg-2">
                            <a href="news/<?= $data['slug']; ?>" class="myhover">
                                <div class="card mycard shadow h-100">
                                    <img src="assets/cover/<?= $data['cover']; ?>" class="card-img-top miniImg" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $data['judul']; ?></h5>
                                        <p class="card-ket"><?= $data['penulis']; ?> | <?= date('d M Y', strtotime($data['created_at'])); ?></p>
                                        <div class="card-text"><?= $data['isi']; ?></div>
                                    </div>
                                    <div class="kategori">
                                        <p><?= $data['kategori']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;  ?>
                <?php }  ?>
                <?= $pager->links('blog', 'mypagenation') ?>
            </div>

        </div>

    </div>

</div>
<?php $this->endSection()  ?>
btn btn-outline-secondary