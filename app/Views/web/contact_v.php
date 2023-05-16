<?php $this->extend('tamplate/tamplateweb'); ?>

<?php $this->section('content');  ?>
<div class=" d-flex align-items-center contact">
    <div class="container ">
        <div class="row">
            <div class="col">
                <h1 class="mb-4 warna">Conect With Us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="media-body">
                    <h4 class="media-heading warna mt-0 font-weight-bold mb-3">Address:</h4>
                    <p class="text-muted font-weight-medium">Vila Indah Permai Blok G26 Teluk Pucung, Teluk Pucung, Kec. Bekasi Utara, Kota Bekasi Prov. Jawa Barat</p>
                </div>
                <div class="media-body">
                    <h4 class="media-heading warna mt-0 font-weight-bold mb-3">Telp:</h4>
                    <p class="text-muted font-weight-medium">xxxx-xxxx-xxxx</p>
                </div>
                <div class="media-body">
                    <h4 class="media-heading warna mt-0 font-weight-bold mb-3">Fax:</h4>
                    <p class="text-muted font-weight-medium">xxxx-xxxx-xxxx</p>
                </div>
                <div class="media-body">
                    <h4 class="media-heading warna mt-0 font-weight-bold mb-3">Email:</h4>
                    <p class="text-muted font-weight-medium">Email.email.com</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-block my-auto">
                    <?php if (session()->getFlashdata('pesan')) :  ?>
                        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif;  ?>
                    <form action="web/kirimPesan" method="post">
                        <div class="mb-3">
                            <label class="form-label warna" for="form6Example1">Name</label>
                            <input type="text" name="nama" id="form6Example1" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama'); ?>" autofocus />
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= (validation_show_error('nama')); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label warna" for="form6Example1">Email</label>
                            <input type="email" name="email" id="form6Example1" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email'); ?>" autofocus />
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= (validation_show_error('email')); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label warna" for="form6Example7">Message</label>
                            <textarea class="form-control <?= (validation_show_error('pesan')) ? 'is-invalid' : ''; ?>" name="pesan" rows="4"><?= old('pesan'); ?></textarea>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= (validation_show_error('pesan')); ?>
                            </div>
                        </div>
                        <input type="submit" class="mybtn" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php $this->endSection();  ?>