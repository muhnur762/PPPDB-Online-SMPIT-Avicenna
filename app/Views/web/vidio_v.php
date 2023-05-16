<?php $this->extend('tamplate/tamplateWeb');  ?>
<?php $this->section('content');  ?>

<div class="container">
    <div class="isi" style="padding-top: 80px;">
        <h1 class="warna">Gallery Vidio</h1>
        <hr>
        <?php if (empty($foto)) { ?>
            <img src="<?= base_url('/assets/other/notfound.png'); ?>" class="notfound" alt="Not Found">
        <?php } else { ?>

        <?php
        }
        ?>
    </div>
</div>


<?php $this->endSection();  ?>