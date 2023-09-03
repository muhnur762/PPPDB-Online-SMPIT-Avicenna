<?php
$this->extend('tamplate/admin/index');
$this->section('content');
?>
<div class="container-fluid">

    <h1 class="h3 m-3 text-gray-800">Edit News</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mx-3">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/news'); ?>">Website</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/news'); ?>">News</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/news/' . $news['slug']); ?>">Detail news</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit News</li>
        </ol>
    </nav>



    <div class="shadow rounded bg-light m-3 p-5">

        <form action="/admin/updateNews/<?= $news['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <!-- Judul -->
            <input type="hidden" name="slug" value="<?= $news['slug']; ?>">
            <input type="hidden" name="coverLama" value="<?= $news['cover']; ?>">
            <input type="hidden" name="fileLama" value="<?= $news['file']; ?>">
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Title</label>
                <input type="text" name="judul" id="form6Example3" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('judul')) ? old('judul') : $news['judul']; ?>" />
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('judul')); ?>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <!-- penulis  -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Author</label>
                        <input type="text" name="penulis" id="form6Example1" class="form-control <?= (validation_show_error('penulis')) ? 'is-invalid' : ''; ?>" value="<?= $news['penulis']; ?>" readonly />
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= (validation_show_error('penulis')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example2">Category</label>
                        <select class="form-control <?= (validation_show_error('kategori')) ? 'is-invalid' : ''; ?>" name="kategori" value="<?= old('kategori'); ?>">
                            <?php
                            $kategori = array("Pengumuman", "Prestasi", "Kegiatan", "Lainnya");
                            foreach ($kategori as $k) :
                                if (old('kategori')) {
                                    $validate = old('kategori');
                                } else {
                                    $validate = $news['kategori'];
                                }
                            ?>
                                <option value="<?= $k; ?>" <?= ($validate == $k) ? 'selected' : '' ?>><?= $k; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= (validation_show_error('kategori')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <!-- cover -->
            <div class="row mb-4">
                <div class="col-md">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="cover">cover</label>
                        <input class="form-control-file <?= (validation_show_error('cover')) ? 'is-invalid' : ''; ?>" type="file" name="cover" id="cover" onchange="previewImg();">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= (validation_show_error('cover')); ?>
                        </div>
                    </div>
                    <img src="/assets/cover/<?= $news['cover']; ?>" class="img-thumbnail img-preview">
                </div>
                <div class="col-md">
                    <!-- file -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="file">File</label>
                        <input class="form-control-file <?= (validation_show_error('file')) ? 'is-invalid' : ''; ?>" type="file" name="file" id="file">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= (validation_show_error('file')); ?>
                        </div>
                    </div>
                    <div class="file-responsive mb-5 <?= (empty($news['file'])) ? "d-none" : ""; ?>" style="padding-bottom: 50%;">
                        <iframe src="<?= base_url('assets/file/' . $news['file']); ?>"></iframe>
                    </div>
                </div>
            </div>

            <!-- isi -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example7">Content</label>
                <textarea class="form-control <?= (validation_show_error('isi')) ? 'is-invalid' : ''; ?>" name="isi" rows="4"><?= (old('isi')) ? old('isi') : $news['isi']; ?></textarea>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('isi')); ?>
                </div>
            </div>

            <!-- Submit button -->
            <input type="submit" value="Update" class="btn btn-primary mb-4" />
        </form>
    </div>

</div>
<?php $this->endSection();  ?>