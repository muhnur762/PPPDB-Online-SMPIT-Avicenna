<?php $this->extend('tamplate/admin/index')  ?>

<?php $this->section('content')  ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-2 text-gray">Formulir</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Formulir</li>
        </ol>
    </nav>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <b class="<?= ($tb_siswa['status'] == "1") ? 'text-success' : ''; ?>">#1 KETERANGAN TENTANG DIRI CALON PESERTA DIDIK</b>

                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse <?= ($page == 1) ? 'show' : ''; ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan1')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan1'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>

                        <form action="/user/editSiswa/<?= $tb_siswa['id']; ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">


                            <div class="form-group">
                                <label for="inputAddress">Nama Lengkap<span class="text-danger">*</span> </label>
                                <input type="text" name="nama" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nama') ? old('nama') : ($tb_siswa['nama'] ? $tb_siswa['nama'] : ''); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (validation_show_error('nama')); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">NIK (Sesuai KK)<span class="text-danger">*</span></label>
                                        <input type="text" name="nik" class="form-control <?= (validation_show_error('nik')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nik') ? old('nik') : ($tb_siswa['nik'] ? $tb_siswa['nik'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nik')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">NISN<span class="text-danger">*</span></label>
                                        <input type="text" name="nisn" class="form-control <?= (validation_show_error('nisn')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nisn') ? old('nisn') : ($tb_siswa['nisn'] ? $tb_siswa['nisn'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nisn')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Kewarganegaraan<span class="text-danger">*</span></label>
                                        <input type="text" name="kewarganegaraan" class="form-control <?= (validation_show_error('kewarganegaraan')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kewarganegaraan') ? old('kewarganegaraan') : ($tb_siswa['kewarganegaraan'] ? $tb_siswa['kewarganegaraan'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('kewarganegaraan')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Agama<span class="text-danger">*</span></label>
                                        <select class="form-control <?= (validation_show_error('agama')) ? 'is-invalid' : ''; ?>" name="agama" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>
                                            <?php
                                            $array_agama = array("Islam", "Kristen", "Katolik", "Hindu", "Budha", "Konghucu");
                                            foreach ($array_agama as $data) :
                                                if (old('agama')) {
                                                    $validate = old('agama');
                                                } else {
                                                    $validate = $tb_siswa['agama'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('agama')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Jenis Kelamin<span class="text-danger">*</span></label>
                                        <select class="form-control" name="jk" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>
                                            <?php
                                            $array_jk = array("Laki-Laki", "Perempuan");
                                            foreach ($array_jk as $data) :
                                                if (old('jk')) {
                                                    $validate = old('jk');
                                                } else {
                                                    $validate = $tb_siswa['jk'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Tempat Lahir<span class="text-danger">*</span></label>
                                        <input type="text" name="tmp_lahir" class="form-control <?= (validation_show_error('tmp_lahir')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('tmp_lahir') ? old('tmp_lahir') : ($tb_siswa['tmp_lahir'] ? $tb_siswa['tmp_lahir'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tmp_lahir')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Tanggal Lahir<span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_lahir" class="form-control <?= (validation_show_error('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('tgl_lahir') ? old('tgl_lahir') : ($tb_siswa['tgl_lahir'] ? $tb_siswa['tgl_lahir'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tgl_lahir')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">No. Akte<span class="text-danger">*</span></label>
                                        <input type="text" name="no_akte" class="form-control <?= (validation_show_error('no_akte')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('no_akte') ? old('no_akte') : ($tb_siswa['no_akte'] ? $tb_siswa['no_akte'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('no_akte')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Status<span class="text-danger">*</span></label>
                                        <select class="form-control" name="status_siswa" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>
                                            <?php
                                            $array_status = array("Anak Kandung", "Anak Angkat", "Anak Tiri", "Yatim", "Piatu");
                                            foreach ($array_status as $s) :
                                                if (old('status_siswa')) {
                                                    $validate = old('status_siswa');
                                                } else {
                                                    $validate = $tb_siswa['status_siswa'];
                                                }
                                            ?>
                                                <option value="<?= $s; ?>" <?= ($validate == $s) ? 'selected' : '' ?>><?= $s; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <b class="<?= ($tb_saudara['status'] == "1") ? 'text-success' : ''; ?>">#2 KETERANGAN JUMLAH SAUDARA DARI CALON PESERTA DIDIK</b>
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse <?= ($page == 2) ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan2')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan2'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>

                        <form action="/user/editSaudara/<?= $tb_saudara['id']; ?>" method="post">
                            <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                            <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                            <?= csrf_field(); ?>


                            <div class="form-group">
                                <label for="inputAddress">Anak ke berapa<span class="text-danger">*</span> </label>
                                <input type="number" name="ank_ke" class="form-control <?= (validation_show_error('ank_ke')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('ank_ke') ? old('ank_ke') : ($tb_saudara['ank_ke'] ? $tb_saudara['ank_ke'] : '0'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (validation_show_error('ank_ke')); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Jumlah Saudara Kandung<span class="text-danger">*</span> </label>
                                        <input type="number" name="jml_sdr_kdg" class="form-control <?= (validation_show_error('jml_sdr_kdg')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('jml_sdr_kdg') ? old('jml_sdr_kdg') : ($tb_saudara['jml_sdr_kdg'] ? $tb_saudara['jml_sdr_kdg'] : '0'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jml_sdr_kdg')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Jumlah Saudara Angkat<span class="text-danger">*</span> </label>
                                        <input type="number" name="jml_sdr_akt" class="form-control <?= (validation_show_error('jml_sdr_akt')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('jml_sdr_akt') ? old('jml_sdr_akt') : ($tb_saudara['jml_sdr_akt'] ? $tb_saudara['jml_sdr_akt'] : '0'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jml_sdr_akt')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Jumlah Saudara Tiri<span class="text-danger">*</span> </label>
                                        <input type="number" name="jml_sdr_tri" class="form-control <?= (validation_show_error('jml_sdr_tri')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('jml_sdr_tri') ? old('jml_sdr_tri') : ($tb_saudara['jml_sdr_tri'] ? $tb_saudara['jml_sdr_tri'] : '0'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jml_sdr_tri')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputAddress">Saudara yang bersekolah di avicenna</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Nama</label>
                                        <input type="text" name="nm_sdr_avc_1" class="form-control <?= (validation_show_error('nm_sdr_avc_1')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nm_sdr_avc_1') ? old('nm_sdr_avc_1') : ($tb_saudara['nm_sdr_avc_1'] ? $tb_saudara['nm_sdr_avc_1'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nm_sdr_avc_1')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Jenjang</label>
                                        <select class="form-control" name="skl_sdr_avc_1" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_skl = array("RA", "SD", "SMP");
                                            foreach ($array_skl as $data) :
                                                if (old('skl_sdr_avc_1')) {
                                                    $validate = old('skl_sdr_avc_1');
                                                } else {
                                                    $validate = $tb_saudara['skl_sdr_avc_1'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Nama</label>
                                        <input type="text" name="nm_sdr_avc_2" class="form-control <?= (validation_show_error('nm_sdr_avc_2')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nm_sdr_avc_2') ? old('nm_sdr_avc_2') : ($tb_saudara['nm_sdr_avc_2'] ? $tb_saudara['nm_sdr_avc_2'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nm_sdr_avc_2')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Jenjang</label>
                                        <select class="form-control" name="skl_sdr_avc_2" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_skl = array("RA", "SD", "SMP");
                                            foreach ($array_skl as $data) :
                                                if (old('skl_sdr_avc_2')) {
                                                    $validate = old('skl_sdr_avc_2');
                                                } else {
                                                    $validate = $tb_saudara['skl_sdr_avc_2'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <b class="<?= ($tb_tmpttgl['status'] == "1") ? 'text-success' : ''; ?>">#3 KETERANGAN TEMPAT TINGGAL CALON PESERTA DIDIK</b>
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse <?= ($page == 3) ? 'show' : ''; ?>" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan3')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan3'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>

                        <form action="/user/editTempattinggal/<?= $tb_tmpttgl['id']; ?>" method="post">
                            <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                            <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                            <?= csrf_field(); ?>

                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-6 float-sm-left pt-0">Apakah alamat tempat tinggal saat ini sesuai dengan alamat pada Kartu Keluarga ?<span class="text-danger">*</span> </legend>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sesuai_kk" id="gridRadios1" value="ya" <?= old('sesuai_kk') == 'ya' ? 'checked' : ($tb_tmpttgl['sesuai_kk'] == 'ya' ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sesuai_kk" id="gridRadios2" value="tidak" <?= old('sesuai_kk') == 'tidak' ? 'checked' : ($tb_tmpttgl['sesuai_kk'] == 'tidak' ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <label for="inputAddress">Nama Perumahan/Daerah<span class="text-danger">*</span> </label>
                                <input type="text" name="daerah" class="form-control <?= (validation_show_error('daerah')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('daerah') ? old('daerah') : ($tb_tmpttgl['daerah'] ? $tb_tmpttgl['daerah'] : ''); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (validation_show_error('daerah')); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Nama Jalan<span class="text-danger">*</span> </label>
                                        <input type="text" name="jl" class="form-control <?= (validation_show_error('jl')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('jl') ? old('jl') : ($tb_tmpttgl['jl'] ? $tb_tmpttgl['jl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jl')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress">Desa/Kelurahan<span class="text-danger">*</span> </label>
                                        <input type="text" name="desa_kel" class="form-control <?= (validation_show_error('desa_kel')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('desa_kel') ? old('desa_kel') : ($tb_tmpttgl['desa_kel'] ? $tb_tmpttgl['desa_kel'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('desa_kel')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress">Kecamatan<span class="text-danger">*</span> </label>
                                        <input type="text" name="kecamatan" class="form-control <?= (validation_show_error('kecamatan')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kecamatan') ? old('kecamatan') : ($tb_tmpttgl['kecamatan'] ? $tb_tmpttgl['kecamatan'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('kecamatan')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">RT<span class="text-danger">*</span> </label>
                                        <input type="text" name="rt" class="form-control <?= (validation_show_error('rt')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('rt') ? old('rt') : ($tb_tmpttgl['rt'] ? $tb_tmpttgl['rt'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('rt')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">RW<span class="text-danger">*</span> </label>
                                        <input type="text" name="rw" class="form-control <?= (validation_show_error('rw')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('rw') ? old('rw') : ($tb_tmpttgl['rw'] ? $tb_tmpttgl['rw'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('rw')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">No Rumah<span class="text-danger">*</span> </label>
                                        <input type="text" name="no_rmh" class="form-control <?= (validation_show_error('no_rmh')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('no_rmh') ? old('no_rmh') : ($tb_tmpttgl['no_rmh'] ? $tb_tmpttgl['no_rmh'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('no_rmh')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Kota/Kabupaten<span class="text-danger">*</span> </label>
                                        <input type="text" name="kab_kota" class="form-control <?= (validation_show_error('kab_kota')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kab_kota') ? old('kab_kota') : ($tb_tmpttgl['kab_kota'] ? $tb_tmpttgl['kab_kota'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('kab_kota')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Kode Pos<span class="text-danger">*</span> </label>
                                        <input type="text" name="kd_pos" class="form-control <?= (validation_show_error('kd_pos')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kd_pos') ? old('kd_pos') : ($tb_tmpttgl['kd_pos'] ? $tb_tmpttgl['kd_pos'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('kd_pos')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Jarak Rumah ke Avicenna<span class="text-danger">*</span> </label>
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" name="jrk" class="form-control <?= (validation_show_error('jrk')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('jrk') ? old('jrk') : ($tb_tmpttgl['jrk'] ? $tb_tmpttgl['jrk'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jrk')); ?>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="inputAddress">Kilometer</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Tinggal Bersama<span class="text-danger">*</span> </label>
                                        <select class="form-control" name="tigl_bersama" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_tinggal = array("Orangtua", "Sendiri di Rumah Orangtua", "Saudara", "Asrama", "Kost");
                                            foreach ($array_tinggal as $data) :
                                                if (old('tigl_bersama')) {
                                                    $validate = old('tigl_bersama');
                                                } else {
                                                    $validate = $tb_tmpttgl['tigl_bersama'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Transportasi Untuk ke SMPIT Avicenna<span class="text-danger">*</span> </label>
                                        <select class="form-control" name="transportasi" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_tinggal = array("Diantar jemput orangtua", "Ojek", "Jemputan", "Sepeda", "Jalan kaki");
                                            foreach ($array_tinggal as $data) :
                                                if (old('transportasi')) {
                                                    $validate = old('transportasi');
                                                } else {
                                                    $validate = $tb_tmpttgl['transportasi'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <b class="<?= ($tb_jamsos['status'] == "1") ? 'text-success' : ''; ?>">#4 KETERANGAN JAMINAN SOSIAL PEMERINTAH</b>
                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse <?= ($page == 4) ? 'show' : ''; ?>" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan4')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan4'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <p class="text-danger">Perhatian</p>
                        <p class="mb-5">Jika tidak memiliki <b>sebagian</b> atau <b>seluruh</b> jaminan sosial dibawah ini maka <b>Kosongkan formulir</b> dan tekan tombol simpan sampai judul berubah menjadi hijau</p>
                        <form action="/user/editJamsos/<?= $tb_jamsos['id']; ?>" method="post">
                            <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                            <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                            <?= csrf_field(); ?>

                            <div class="form-group row">
                                <label for="input" class="col-sm-4 col-form-label ">Nomor Kartu Keluarga Sejahtera (KKS)</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kks" class="form-control <?= (validation_show_error('kks')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('kks') ? old('kks') : ($tb_jamsos['kks'] ? $tb_jamsos['kks'] : ''); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= (validation_show_error('kks')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-4 col-form-label ">Nomor Kartu Perlindungan Sosial (KPS) </label>
                                <div class="col-sm-8">
                                    <input type="text" name="kps" class="form-control <?= (validation_show_error('kps')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('kps') ? old('kps') : ($tb_jamsos['kps'] ? $tb_jamsos['kps'] : ''); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= (validation_show_error('kps')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-4 col-form-label ">Nomor Kartu Indonesia Pintar (KIP)</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kip" class="form-control <?= (validation_show_error('kip')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('kip') ? old('kip') : ($tb_jamsos['kip'] ? $tb_jamsos['kip'] : ''); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= (validation_show_error('kip')); ?>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-md-5 float-sm-left pt-0">Terdaftar pada DTKS
                                    (Data Terpadu Kesejahteraan Sosial (DTKS) Kemensos) ?
                                </legend>
                                <div class="col-md-7">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="dtks" id="customCheck1" value="ya" <?= old('dtks') == 'ya' ? 'checked' : ($tb_jamsos['dtks'] == 'ya' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="customCheck1">YA</label>
                                    </div>
                                </div>
                            </fieldset>







                            <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <b class="<?= ($tb_kesehatan['status'] == "1") ? 'text-success' : ''; ?>">#5 KETERANGAN KESEHATAN CALON PESERTA DIDIK</b>
                    </button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse <?= ($page == 5) ? 'show' : ''; ?>" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan5')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan5'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <form action="/user/editKesehatan/<?= $tb_kesehatan['id']; ?>" method="post">
                            <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                            <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                            <?= csrf_field(); ?>

                            <div class="form-group">
                                <label for="inputAddress">Golongan Darah<span class="text-danger">*</span> </label>
                                <select class="form-control" name="gol_dar" id="inputAddress">
                                    <option value="NULL">--Pilih--</option>

                                    <?php
                                    $array_goldar = array("A", "B", "AB", "O");
                                    foreach ($array_goldar as $data) :
                                        if (old('gol_dar')) {
                                            $validate = old('gol_dar');
                                        } else {
                                            $validate = $tb_kesehatan['gol_dar'];
                                        }
                                    ?>
                                        <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Penyakit Berat Yang Pernah Diderita</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputAddress">Tahun</label>
                                                <input type="text" name="th_penyakit_1" class="form-control <?= (validation_show_error('th_penyakit_1')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('th_penyakit_1') ? old('th_penyakit_1') : ($tb_kesehatan['th_penyakit_1'] ? $tb_kesehatan['th_penyakit_1'] : ''); ?>">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= (validation_show_error('th_penyakit_1')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputAddress">Nama</label>
                                                <input type="text" name="nm_penyakit_1" class="form-control <?= (validation_show_error('nm_penyakit_1')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nm_penyakit_1') ? old('nm_penyakit_1') : ($tb_kesehatan['nm_penyakit_1'] ? $tb_kesehatan['nm_penyakit_1'] : ''); ?>">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= (validation_show_error('nm_penyakit_1')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputAddress">Keterangan</label>
                                                <input type="text" name="kt_penyakit_1" class="form-control <?= (validation_show_error('kt_penyakit_1')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kt_penyakit_1') ? old('kt_penyakit_1') : ($tb_kesehatan['kt_penyakit_1'] ? $tb_kesehatan['kt_penyakit_1'] : ''); ?>">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= (validation_show_error('kt_penyakit_1')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputAddress">Tahun</label>
                                                <input type="text" name="th_penyakit_2" class="form-control <?= (validation_show_error('th_penyakit_2')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('th_penyakit_2') ? old('th_penyakit_2') : ($tb_kesehatan['th_penyakit_2'] ? $tb_kesehatan['th_penyakit_2'] : ''); ?>">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= (validation_show_error('th_penyakit_2')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputAddress">Nama</label>
                                                <input type="text" name="nm_penyakit_2" class="form-control <?= (validation_show_error('nm_penyakit_2')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nm_penyakit_2') ? old('nm_penyakit_2') : ($tb_kesehatan['nm_penyakit_2'] ? $tb_kesehatan['nm_penyakit_2'] : ''); ?>">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= (validation_show_error('nm_penyakit_2')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputAddress">Keterangan</label>
                                                <input type="text" name="kt_penyakit_2" class="form-control <?= (validation_show_error('kt_penyakit_2')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kt_penyakit_2') ? old('kt_penyakit_2') : ($tb_kesehatan['kt_penyakit_2'] ? $tb_kesehatan['kt_penyakit_2'] : ''); ?>">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= (validation_show_error('kt_penyakit_2')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Kelainan Jasmani</label>
                                        <select class="form-control" name="kl_jasmani" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_keljas = array('Tuna Daksa', 'Tuna Runggu', 'Tuna Wicara', 'Tuna Laras');
                                            foreach ($array_keljas as $data) :
                                                if (old('kl_jasmani')) {
                                                    $validate = old('kl_jasmani');
                                                } else {
                                                    $validate = $tb_kesehatan['kl_jasmani'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="inputAddress">Kelainan Jasmani Lainnya</label>
                                        <input type="text" name="kl_jasmani_lain" class="form-control <?= (validation_show_error('kl_jasmani_lain')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kl_jasmani_lain') ? old('kl_jasmani_lain') : ($tb_kesehatan['kl_jasmani_lain'] ? $tb_kesehatan['kl_jasmani_lain'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('kl_jasmani_lain')); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Tinggi Badan (Cm)<span class="text-danger">*</span> </label>
                                        <input type="text" name="tb" class="form-control <?= (validation_show_error('tb')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('tb') ? old('tb') : ($tb_kesehatan['tb'] ? $tb_kesehatan['tb'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tb')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Berat Badan (Kg)<span class="text-danger">*</span> </label>
                                        <input type="text" name="bb" class="form-control <?= (validation_show_error('bb')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('bb') ? old('bb') : ($tb_kesehatan['bb'] ? $tb_kesehatan['bb'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('bb')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Status Vaksin Covid-19<span class="text-danger">*</span> </label>
                                        <select class="form-control" name="vaksin" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_vaksin = array('Belum Vaksin', 'Sudah Vaksin 1', 'Sudah Vaksin 2');
                                            foreach ($array_vaksin as $data) :
                                                if (old('vaksin')) {
                                                    $validate = old('vaksin');
                                                } else {
                                                    $validate = $tb_kesehatan['vaksin'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Sudah Pernah Terpapar Covid-19<span class="text-danger">*</span> </label>
                                        <select class="form-control" name="covid" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_covid = array('Sudah', 'Belum');
                                            foreach ($array_covid as $data) :
                                                if (old('covid')) {
                                                    $validate = old('covid');
                                                } else {
                                                    $validate = $tb_kesehatan['covid'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <b class="<?= ($tb_asalskl['status'] == "1") ? 'text-success' : ''; ?>">#6 KETERANGAN PENDIDIKAN SEBELUMNYA</b>
                    </button>
                </h2>
            </div>
            <div id="collapseSix" class="collapse <?= ($page == 6) ? 'show' : ''; ?>" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan6')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan6'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <form action="/user/editAsalskl/<?= $tb_kesehatan['id']; ?>" method="post">
                            <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                            <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="inputAddress">Nama SD / MI<span class="text-danger">*</span></label>
                                        <input type="text" name="nama_skl" class="form-control <?= (validation_show_error('nama_skl')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('nama_skl') ? old('nama_skl') : ($tb_asalskl['nama_skl'] ? $tb_asalskl['nama_skl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nama_skl')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="inputAddress">Status Sekolah<span class="text-danger">*</span> </label>
                                        <select class="form-control" name="st_sekolah" id="inputAddress">
                                            <option value="NULL">--Pilih--</option>

                                            <?php
                                            $array_status = array('Negeri', 'Swasta');
                                            foreach ($array_status as $data) :
                                                if (old('st_sekolah')) {
                                                    $validate = old('st_sekolah');
                                                } else {
                                                    $validate = $tb_asalskl['st_sekolah'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Alamat Sekolah</label>
                                </div>


                                <div class="col-lg-8">

                                    <div class="form-group">
                                        <label for="inputAddress">Kecamatan<span class="text-danger">*</span></label>
                                        <input type="text" name="kecamatan_skl" class="form-control <?= (validation_show_error('kecamatan_skl')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kecamatan_skl') ? old('kecamatan_skl') : ($tb_asalskl['kecamatan_skl'] ? $tb_asalskl['kecamatan_skl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('kecamatan_skl')); ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputAddress">Kota / Kabupaten<span class="text-danger">*</span></label>
                                        <input type="text" name="kotkab_skl" class="form-control <?= (validation_show_error('kotkab_skl')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('kotkab_skl') ? old('kotkab_skl') : ($tb_asalskl['kotkab_skl'] ? $tb_asalskl['kotkab_skl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('kotkab_skl')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress">Provinsi<span class="text-danger">*</span></label>
                                        <input type="text" name="prov_skl" class="form-control <?= (validation_show_error('prov_skl')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('prov_skl') ? old('prov_skl') : ($tb_asalskl['prov_skl'] ? $tb_asalskl['prov_skl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('prov_skl')); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->endSection();  ?>