<?php $this->extend('tamplate/sidebar');  ?>
<?php $this->section('contentMain');  ?>
<?php
if ($detail['created_at'] == $detail['updated_at']) {
    $tanggal = date('d M Y', strtotime($detail['created_at']));
    $jam = date('H:i', strtotime($detail['created_at']));
} else {
    $tanggal = date('d M Y', strtotime($detail['updated_at'])) . " (Diedit)";
    $jam = date('H:i', strtotime($detail['updated_at']));
}
?>
<div class="px-3">
    <div class="shadow p-4 mb-4" style="border-radius: 10px;">
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
    <div class="isi-detail ">
        <?= $detail['isi']; ?>
        <div class="file-responsive <?= (empty($detail['file'])) ? "d-none" : ""; ?>">
            <iframe src="<?= base_url('assets/file/' . $detail['file']); ?>"></iframe>
        </div>
    </div>
    <div class="share mt-5">
        <?php
        $link = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        ?>
        <p class="text-muted">Share :</p>
        <div class="mt-0">
            <a rel="nofollow" href="https://www.facebook.com/sharer.php?u=https://<?= $link; ?>" class=" btn btn-primary btn-circle">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a rel="nofollow" href="https://twitter.com/share?url=https://<?= $link; ?>" class=" btn btn-info btn-circle">
                <i class="fab fa-twitter text-light"></i>
            </a>
            <a rel="nofollow" href="whatsapp://send?text=https://<?= $link; ?>" class=" btn  btn-circle" style="background-color: #25D366;">
                <i class="fab fa-whatsapp text-light"></i>
            </a>
            <a rel="nofollow" href="https://plus.google.com/share?url=https://<?= $link; ?>" class=" btn btn-danger  btn-circle">
                <i class="fab fa-google-plus text-light"></i>
            </a>
        </div>

    </div>
</div>

<?php $this->endSection();  ?>