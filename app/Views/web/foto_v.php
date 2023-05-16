<?php $this->extend('tamplate/tamplateWeb');  ?>
<?php $this->section('content');  ?>

<div class="container">
    <div class="isi" style="padding-top: 80px;">
        <h1 class="warna">Gallery Foto</h1>
        <hr>
        <?php if (empty($foto)) { ?>
            <img src="<?= base_url('/assets/other/notfound.png'); ?>" class="notfound" alt="Not Found">
        <?php } else { ?>
            <div class="wrap-foto">
                <?php foreach ($foto as $data) :  ?>
                    <img src="/assets/img/<?= $data['cover']; ?>" alt="<?= $data['cover']; ?>" data-bs-toggle="modal" data-bs-target="#foto<?= $data['id'] ?>" style="cursor: pointer;">

                    <div class="modal fade" id="foto<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="<?= base_url('/assets/img/' . $data['cover']); ?>" download="" class="bi bi-download text-secondary fs-5"></a>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="/assets/img/<?= $data['cover']; ?>" alt="<?= $data['cover']; ?>">
                                    <p> <b><?= $data['penulis']; ?></b> <?= $data['caption']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>


            </div>
        <?php
        }
        ?>
    </div>
</div>
<div class="container">
    <?= $pager->links('foto', 'mypagenation') ?>
</div>
</div>


<?php $this->endSection();  ?>