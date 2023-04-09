<?php $this->extend('tamplate/sidebar');  ?>
<?php $this->section('contentMain');  ?>
<?php
if ($detail['created_at'] == $detail['updated_at']) {
    $tanggal = date('d m Y', strtotime($detail['created_at']));
    $jam = date('H:i', strtotime($detail['created_at']));
} else {
    $tanggal = date('d m Y', strtotime($detail['updated_at'])) . "(Diedit)";
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
        <img src="<?= base_url('assets/other/' . $detail['cover']) ?>" alt="cover" class="w-100" style="border-radius: 10px;">
    </div>
    <div class="isi-detail">
        <?= $detail['isi']; ?>
    </div>
</div>

<?php $this->endSection();  ?>