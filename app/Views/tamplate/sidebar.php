<?php $this->extend('tamplate/tamplateWeb');  ?>
<?php $this->section('content');  ?>

<div class="container pt-5" id="banner">
    <a href="<?= base_url('/ppdb'); ?>" class="d-block">
        <div class="banner-2">
            <img src="<?= base_url(); ?>assets/other/<?= $banner[0]['image']; ?>" alt="banner" class="w-100">
        </div>
    </a>
</div>
<div class="container">
    <div class="sidebar">

        <!-- Main -->
        <main class="sidebar__main">
            <?php $this->renderSection('contentMain')  ?>
        </main>

        <!-- Sidebar -->
        <aside class="sidebar__sidebar">
            <a href="/sambutan" class="text-decoration-none">
                <div class="sambutan-side">
                    <div class="head-sambutan">
                        <h4>Sambutan Kepala Sekolah</h4>
                    </div>
                    <div class="body-sambutan">
                        <img src="<?= base_url('/assets/other/' . $sambut['cover']); ?>" class="w-100 rounded" alt="sambutan">
                        <h5 class="mt-2 w-100 text-center warna"><?= $sambut['nama']; ?></h5>
                        <p class="card-text text-dark"><?= $sambut['isi']; ?></p>
                    </div>
                </div>
            </a>
            <div class="news-side mt-3">
                <div class="head-news">
                    <h4>Latest News</h4>
                </div>
                <div class="body-news">
                    <?php foreach ($blog as $data) :  ?>
                        <a href="<?= base_url('news/' . $data['slug']); ?>" class="text-decoration-none">
                            <div class="content-news mb-2">
                                <img src="<?= base_url('/assets/cover/' . $data['cover']); ?>" class="w-100 rounded" alt="news">
                                <h6 class="mt-2 card-title"><?= $data['judul']; ?></h6>
                                <p class="text-secondary" style="font-size:0.8rem"><?= date('d M Y', strtotime($data['created_at'])) ?></p>
                            </div>
                        </a>
                    <?php endforeach;  ?>

                </div>
            </div>
        </aside>
        <?php $this->renderSection('conditional')  ?>
    </div>
</div>
<?php $this->endSection();  ?>