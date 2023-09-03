<?php
$this->extend('tamplate/admin/index');
$this->section('content');
?>
<div class="container-fluid">
    <h1 class="h3 m-3 text-gray-800">Edit Images</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mx-3">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/foto'); ?>">Website</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/foto'); ?>">Images</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Images</li>
        </ol>
    </nav>


    <div class="shadow rounded bg-light m-3 p-5">

        <form action="/admin/updateFoto/<?= $foto['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="coverLama" value="<?= $foto['cover']; ?>">
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example1">Author</label>
                <input type="text" name="penulis" id="form6Example1" class="form-control <?= (validation_show_error('penulis')) ? 'is-invalid' : ''; ?>" value="<?= (old('penulis')) ? old('penulis') : $foto['penulis']; ?>" readonly />
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('penulis')); ?>
                </div>
            </div>


            <!-- isi -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example7">Caption</label>
                <textarea class="form-control <?= (validation_show_error('caption')) ? 'is-invalid' : ''; ?>" name="caption" rows="4" autofocus><?= (old('caption')) ? old('caption') : $foto['caption']; ?></textarea>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('caption')); ?>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <img src="/assets/img/<?= $foto['cover']; ?>" class="img-thumbnail img-preview">
                </div>
                <div class="col-md-9">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="file">cover</label>
                        <input class="form-control-file <?= (validation_show_error('cover')) ? 'is-invalid' : ''; ?>" type="file" name="cover" id="cover" value="<?= old('cover'); ?>" onchange="previewImg();">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= (validation_show_error('cover')); ?>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Submit button -->
            <div class="d-flex justify-content-between">
                <div class="d-inline">
                    <input type="submit" value="Submit" class="btn btn-primary mb-4" />
                </div>
                <div class="d-inline">
                    <a href="/admin/foto" class="btn btn-secondary  ">Back</a>
                </div>
            </div>

        </form>
    </div>

</div>
<?php $this->endSection();  ?>