<?php $this->extend('tamplate/tamplateWeb');  ?>
<?php $this->section('content');  ?>

<div class="tumbnail">
    <img src="<?= base_url("/assets/other/tumbnail.png"); ?>" class="w-100 d-lg-block d-none" alt="">
</div>
<div class="container">
    <div class="sidebar">


        <!-- Main -->
        <main class="sidebar__main">
            <?php $this->renderSection('contentMain')  ?>
        </main>

        <!-- Sidebar -->
        <aside class="sidebar__sidebar">
            <div class="sambutan-side">
                <div class="head-sambutan">
                    <h4>Sambutan Kepala Sekolah</h4>
                </div>
                <div class="body-sambutan">
                    <img src="<?= base_url('/assets/other/' . $sambut['cover']); ?>" class="w-100 rounded" alt="">
                    <h5 class="mt-2 w-100 text-center warna"><?= $sambut['nama']; ?></h5>
                    <p class="card-text"><?= $sambut['isi']; ?></p>
                </div>
            </div>
            <div class="news-side mt-3">
                <div class="head-news">
                    <h4>Latest News</h4>
                </div>
                <div class="body-news">
                    <?php foreach ($blog as $data) :  ?>
                        <a href="<?= base_url('news/' . $data['slug']); ?>" class="text-decoration-none">
                            <div class="content-news mb-2">
                                <img src="<?= base_url('/assets/other/' . $data['cover']); ?>" class="w-100 rounded" alt="">
                                <h6 class="mt-2 card-title"><?= $data['judul']; ?></h6>
                            </div>
                        </a>
                    <?php endforeach;  ?>

                </div>
            </div>
        </aside>
    </div>
</div>

<?php $this->endSection();  ?>