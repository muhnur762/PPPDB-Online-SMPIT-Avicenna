<?php
$this->extend('tamplate/admin/index');
$this->section('content');
?>
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mx-3">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/news'); ?>">Website</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/news'); ?>">News</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail News</li>
        </ol>
    </nav>
    <div class="shadow rounded bg-light w-75 d-block mx-auto">

        <?php
        if ($detail['created_at'] == $detail['updated_at']) {
            $tanggal = date('d m Y', strtotime($detail['created_at']));
            $jam = date('H:i', strtotime($detail['created_at']));
        } else {
            $tanggal = date('d m Y', strtotime($detail['updated_at'])) . "(Diedit)";
            $jam = date('H:i', strtotime($detail['updated_at']));
        }
        ?>
        <div class="p-3">
            <div class="shadow p-4 mt-2 mb-4" style="border-radius: 10px;">
                <h1 class="warna text-center"><?= $detail['judul']; ?></h1>
                <hr>
                <div class="data text-center">

                    <p class="d-md-inline d-block warna2 mx-2"><i class="bi bi-person-circle"></i> <?= $detail['penulis']; ?></p>
                    <p class="d-md-inline d-block warna2 mx-2"><i class="bi bi-calendar3"></i> <?= $tanggal; ?></p>
                    <p class="d-md-inline d-block warna2 mx-2"><i class="bi bi-clock"></i> <?= $jam; ?></p>
                    <p class="d-md-inline d-block warna2 mx-2"><i class="bi bi-tag"></i> <?= $detail['kategori']; ?></p>

                </div>
            </div>
            <div class="cover-detail">
                <img src="<?= base_url('assets/cover/' . $detail['cover']) ?>" alt="cover" class="w-100" style="border-radius: 10px;">
            </div>
            <div class="isi-detail mt-2 pb-5">
                <?= $detail['isi']; ?>
                <div class="file-responsive mb-5 <?= (empty($detail['file'])) ? "d-none" : ""; ?>">
                    <iframe src="<?= base_url('assets/file/' . $detail['file']); ?>"></iframe>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-inline">
                        <a href="/admin/editNews/<?= $detail['slug']; ?>" class="btn btn-warning">Edit</a>
                        <form action="/admin/news/<?= $detail['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you can delete this data?');">Delete</button>
                        </form>
                    </div>
                    <div class="d-inline">
                        <a href="/admin/news" class="btn btn-secondary  ">Back</a>
                    </div>
                </div>





            </div>
        </div>
    </div>
</div>

<?php $this->endSection();  ?>