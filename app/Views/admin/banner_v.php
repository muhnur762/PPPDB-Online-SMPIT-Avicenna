<?php
$this->extend('tamplate/admin/index');
$this->section('content');
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Banners</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Website</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banner</li>
        </ol>
    </nav>

</div>
<div class="bg-light shadow rounded p-1 p-md-5 m-4">
    <form action="/admin/updateBanner/<?= $banner['id']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="imageLama" value="<?= $banner['image']; ?>">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="form-outline mb-4">
                    <!-- <label class="form-label" for="cover">cover</label> -->
                    <input class="form-control-file <?= (validation_show_error('image')) ? 'is-invalid' : ''; ?>" type="file" name="image" id="image" value="<?= old('image'); ?>" onchange="previewBanner();">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= (validation_show_error('image')); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <input type="hidden" name="author" value="<?= user()->fullname; ?>">
                <input type="submit" value="Update" class="btn btn-primary float-right mb-4" />
            </div>
        </div>
    </form>
    <p class="text-danger">Note :
        disarankan menggunakan perbandingan 4,5 : 1
    </p>
    <?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;  ?>
    <!-- <img src="/assets/other/defauld.jpg" class="img-thumbnail img-preview"> -->


    <img class="w-100 rounded banner-preview img-thumbnail" src="<?= base_url('assets/other/' . $banner['image']) ?>" alt="<?= $banner['image']; ?>">
    <p class="text-muted mt-1" style="font-size: 13px;">Diapdate <?= date('d-m-Y H:i', strtotime($banner['updated_at'])); ?> oleh <?= $banner['author']; ?></p>

</div>

<?php $this->endSection()  ?>