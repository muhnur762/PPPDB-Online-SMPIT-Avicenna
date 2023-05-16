<?php
$this->extend('tamplate/admin/index');
$this->section('content');
?>
<div class="container-fluid">

    <div class="shadow rounded bg-light m-3 p-5">

        <form action="/admin/updatePesan/<?= $pesan['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <!-- Judul -->
            <div class="row">
                <div class="col-md">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example3">Name</label>
                        <input type="text" name="judul" id="form6Example3" class="form-control" value="<?= $pesan['nama']; ?>" disabled />
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example3">Email</label>
                        <input type="text" name="judul" id="form6Example3" class="form-control" value="<?= $pesan['email']; ?>" disabled />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example3">Date</label>
                        <input type="text" name="judul" id="form6Example3" class="form-control" value="<?= $pesan['created_at']; ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example3">Message</label>
                        <textarea class="form-control" name="pesan" rows="8" disabled> <?= $pesan['pesan']; ?></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example3">Date</label>
                        <input type="text" name="judul" id="form6Example3" class="form-control" value="<?= ($pesan['created_at'] == $pesan['updated_at']) ? '' : $pesan['updated_at'] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example7">Answer</label>
                        <textarea class="form-control <?= (validation_show_error('jawaban')) ? 'is-invalid' : ''; ?>" name="jawaban" rows="8" <?= (!empty($pesan['jawaban'])) ? 'disabled' : 'autofocus'; ?>><?= (old('jawaban')) ? old('jawaban') : $pesan['jawaban']; ?></textarea>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= (validation_show_error('jawaban')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($pesan['status'] == '1') :  ?>
                <!-- Submit button -->
                <input type="submit" value="Submit" class="btn btn-primary" />
            <?php endif;  ?>
            <a href="/admin/pesan" class="btn btn-danger">Back</a>

        </form>
    </div>

</div>
<?php $this->endSection();  ?>