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

    <?php
    if ($tb_daftar['status'] == '0') {
    ?>
        <div class="alert alert-warning" role="alert">
            <b>#227<?= date('ymd', strtotime($tb_daftar['created_at'])) . $tb_daftar['id'] ?> | </b> Status : <b>Pengisian Formulir</b>
        </div>
    <?php
    } else if ($tb_daftar['status'] == '1') {
    ?>
        <div class="alert alert-primary" role="alert">
            <b>#227<?= date('ymd', strtotime($tb_daftar['created_at'])) . $tb_daftar['id'] ?> | </b> Status : <b>Diserahkan</b>
        </div>

    <?php
    } else if ($tb_daftar['status'] == '2') {
    ?>
        <div class="alert alert-success py-" role="alert">

            <div class="row align-items-center">
                <div class="col text-center">
                    <b class="h4 d-block">#227<?= date('ymd', strtotime($tb_daftar['created_at'])) . $tb_daftar['id'] ?></b>
                    <b class="h4 d-block"><?= ($tb_siswa['nama']) ? $tb_siswa['nama'] : ''; ?></b>
                    <b class="h3 d-block font-weight-bold">TERVERIFIKASI</b>
                    <button class="btn btn-sm btn-success mb-3 mb-md-0" onclick="window.open('<?= site_url('user/formulirPdf/' . base64_encode('ppdb-' . $tb_daftar['id'])); ?>','blank')">Download Formulir</button>
                </div>
                <div class="col">
                    <img class="d-block mx-auto" alt='testing' src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?= site_url('user/formulirPdf/' . base64_encode('ppdb-' . $tb_daftar['id'])); ?>&choe=UTF-8' />
                </div>
            </div>

        </div>
    <?php
    }


    ?>




    <div class="accordion" id="accordionExample">
        <!-- 1 siswa -->
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
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">


                                <div class="form-group">
                                    <label for="inputAddress">Nama Lengkap<span class="text-danger">*</span> </label>
                                    <input type="text" name="nama" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= user()->fullname; ?>" readonly>
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
                                                <option value="">--Pilih--</option>
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
                                                <option value="">--Pilih--</option>
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
                                                <option value="">--Pilih--</option>
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
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 2 saudara -->
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
                            <?= csrf_field(); ?>
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">



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
                                                <option value="">--Pilih--</option>

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
                                                <option value="">--Pilih--</option>

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
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 3 alamat -->
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
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">

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
                                                <option value="">--Pilih--</option>

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
                                                <option value="">--Pilih--</option>

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
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 4 jaminan sosial -->
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
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">

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
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 5 kesehatan -->
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
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">

                                <div class="form-group">
                                    <label for="inputAddress">Golongan Darah<span class="text-danger">*</span> </label>
                                    <select class="form-control" name="gol_dar" id="inputAddress">
                                        <option value="">--Pilih--</option>

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
                                                <option value="">--Pilih--</option>

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
                                                <option value="">--Pilih--</option>

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
                                                <option value="">--Pilih--</option>

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
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 6 asal sekaolah -->
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
                        <form action="/user/editAsalskl/<?= $tb_asalskl['id']; ?>" method="post">
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>

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
                                                <option value="">--Pilih--</option>

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
                                            <label for="inputAddress">Provinsi<span class="text-danger">*</span> </label>
                                            <input type="text" name="prov_skl" class="form-control <?= (validation_show_error('prov_skl')) ? 'is-invalid' : ''; ?>" id="inputAddress" value="<?= old('prov_skl') ? old('prov_skl') : ($tb_asalskl['prov_skl'] ? $tb_asalskl['prov_skl'] : ''); ?>">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('prov_skl')); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 7 ayah -->
        <div class="card">
            <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <b class="<?= ($tb_ayah['status'] == "1") ? 'text-success' : ''; ?>">#7 KETERANGAN TENTANG AYAH</b>
                    </button>
                </h2>
            </div>
            <div id="collapseSeven" class="collapse <?= ($page == 7) ? 'show' : ''; ?>" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan7')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan7'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <form action="/user/editAyah/<?= $tb_ayah['id']; ?>" method="post">
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                                <?= csrf_field(); ?>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Nama Lengkap Tanpa Gelar<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nm_ay" class="form-control <?= (validation_show_error('nm_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('nm_ay') ? old('nm_ay') : ($tb_ayah['nm_ay'] ? $tb_ayah['nm_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nm_ay')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Nomor Induk Kependudukan (NIK)<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nik_ay" class="form-control <?= (validation_show_error('nik_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('nik_ay') ? old('nik_ay') : ($tb_ayah['nik_ay'] ? $tb_ayah['nik_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nik_ay')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Tempat & Tanggal Lahir<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="tmplhr_ay" class="form-control <?= (validation_show_error('tmplhr_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tmplhr_ay') ? old('tmplhr_ay') : ($tb_ayah['tmplhr_ay'] ? $tb_ayah['tmplhr_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tmplhr_ay')); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgllhr_ay" class="form-control <?= (validation_show_error('tgllhr_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tgllhr_ay') ? old('tgllhr_ay') : ($tb_ayah['tgllhr_ay'] ? $tb_ayah['tgllhr_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tgllhr_ay')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Agama<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('agama_ay')) ? 'is-invalid' : ''; ?>" name="agama_ay" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_agama as $data) :
                                                if (old('agama_ay')) {
                                                    $validate = old('agama_ay');
                                                } else {
                                                    $validate = $tb_ayah['agama_ay'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('agama_ay')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Kewarganegaraan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="wrg_ay" class="form-control <?= (validation_show_error('wrg_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('wrg_ay') ? old('wrg_ay') : ($tb_ayah['wrg_ay'] ? $tb_ayah['wrg_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('wrg_ay')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Pendidikan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('pend_ay')) ? 'is-invalid' : ''; ?>" name="pend_ay" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $array_pendidikan = ["Tidak Sekolah", "SD", "SMP", "SMA", "S1", "S2", "S3"];
                                            foreach ($array_pendidikan as $data) :
                                                if (old('pend_ay')) {
                                                    $validate = old('pend_ay');
                                                } else {
                                                    $validate = $tb_ayah['pend_ay'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('pend_ay')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Pekerjaan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="peker_ay" class="form-control <?= (validation_show_error('peker_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('peker_ay') ? old('peker_ay') : ($tb_ayah['peker_ay'] ? $tb_ayah['peker_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('peker_ay')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Penghasilan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('penghs_ay')) ? 'is-invalid' : ''; ?>" name="penghs_ay" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $array_penhasilan = ['Tidak berpenghasilan', '0 - 5 juta', '6 - 10 juta', 'Lebih dari 10 juta'];
                                            foreach ($array_penhasilan as $data) :
                                                if (old('penghs_ay')) {
                                                    $validate = old('penghs_ay');
                                                } else {
                                                    $validate = $tb_ayah['penghs_ay'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('penghs_ay')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Alamat<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat_ay" class="form-control <?= (validation_show_error('alamat_ay')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="3"><?= old('alamat_ay') ? old('alamat_ay') : ($tb_ayah['alamat_ay'] ? $tb_ayah['alamat_ay'] : ''); ?></textarea>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('alamat_ay')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Telp Rumah<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tlprmh_ay" class="form-control <?= (validation_show_error('tlprmh_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tlprmh_ay') ? old('tlprmh_ay') : ($tb_ayah['tlprmh_ay'] ? $tb_ayah['tlprmh_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tlprmh_ay')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Handphone<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="hp_ay" class="form-control <?= (validation_show_error('hp_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('hp_ay') ? old('hp_ay') : ($tb_ayah['hp_ay'] ? $tb_ayah['hp_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('hp_ay')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Telp Kantor<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tlpkntr_ay" class="form-control <?= (validation_show_error('tlpkntr_ay')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tlpkntr_ay') ? old('tlpkntr_ay') : ($tb_ayah['tlpkntr_ay'] ? $tb_ayah['tlpkntr_ay'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tlpkntr_ay')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Keterangan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('ket_ay')) ? 'is-invalid' : ''; ?>" name="ket_ay" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $array_ket = ['Masih Hidup', 'Meninggal Dunia'];
                                            foreach ($array_ket as $data) :
                                                if (old('ket_ay')) {
                                                    $validate = old('ket_ay');
                                                } else {
                                                    $validate = $tb_ayah['ket_ay'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('ket_ay')); ?>
                                        </div>
                                    </div>
                                </div>





                                <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 8 ibu -->
        <div class="card">
            <div class="card-header" id="headingEight">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <b class="<?= ($tb_ibu['status'] == "1") ? 'text-success' : ''; ?>">#8 KETERANGAN TENTANG IBU</b>
                    </button>
                </h2>
            </div>
            <div id="collapseEight" class="collapse <?= ($page == 8) ? 'show' : ''; ?>" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan8')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan8'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <form action="/user/editIbu/<?= $tb_ibu['id']; ?>" method="post">
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                                <?= csrf_field(); ?>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Nama Lengkap Tanpa Gelar<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nm_ib" class="form-control <?= (validation_show_error('nm_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('nm_ib') ? old('nm_ib') : ($tb_ibu['nm_ib'] ? $tb_ibu['nm_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nm_ib')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Nomor Induk Kependudukan (NIK)<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nik_ib" class="form-control <?= (validation_show_error('nik_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('nik_ib') ? old('nik_ib') : ($tb_ibu['nik_ib'] ? $tb_ibu['nik_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nik_ib')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Tempat & Tanggal Lahir<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="tmplhr_ib" class="form-control <?= (validation_show_error('tmplhr_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tmplhr_ib') ? old('tmplhr_ib') : ($tb_ibu['tmplhr_ib'] ? $tb_ibu['tmplhr_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tmplhr_ib')); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgllhr_ib" class="form-control <?= (validation_show_error('tgllhr_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tgllhr_ib') ? old('tgllhr_ib') : ($tb_ibu['tgllhr_ib'] ? $tb_ibu['tgllhr_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tgllhr_ib')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Agama<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('agama_ib')) ? 'is-invalid' : ''; ?>" name="agama_ib" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_agama as $data) :
                                                if (old('agama_ib')) {
                                                    $validate = old('agama_ib');
                                                } else {
                                                    $validate = $tb_ibu['agama_ib'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('agama_ib')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Kewarganegaraan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="wrg_ib" class="form-control <?= (validation_show_error('wrg_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('wrg_ib') ? old('wrg_ib') : ($tb_ibu['wrg_ib'] ? $tb_ibu['wrg_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('wrg_ib')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Pendidikan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('pend_ib')) ? 'is-invalid' : ''; ?>" name="pend_ib" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_pendidikan as $data) :
                                                if (old('pend_ib')) {
                                                    $validate = old('pend_ib');
                                                } else {
                                                    $validate = $tb_ibu['pend_ib'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('pend_ib')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Pekerjaan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="peker_ib" class="form-control <?= (validation_show_error('peker_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('peker_ib') ? old('peker_ib') : ($tb_ibu['peker_ib'] ? $tb_ibu['peker_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('peker_ib')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Penghasilan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('penghs_ib')) ? 'is-invalid' : ''; ?>" name="penghs_ib" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_penhasilan as $data) :
                                                if (old('penghs_ib')) {
                                                    $validate = old('penghs_ib');
                                                } else {
                                                    $validate = $tb_ibu['penghs_ib'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('penghs_ib')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Alamat<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat_ib" class="form-control <?= (validation_show_error('alamat_ib')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="3"><?= old('alamat_ib') ? old('alamat_ib') : ($tb_ibu['alamat_ib'] ? $tb_ibu['alamat_ib'] : ''); ?></textarea>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('alamat_ib')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Telp Rumah<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tlprmh_ib" class="form-control <?= (validation_show_error('tlprmh_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tlprmh_ib') ? old('tlprmh_ib') : ($tb_ibu['tlprmh_ib'] ? $tb_ibu['tlprmh_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tlprmh_ib')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Handphone<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="hp_ib" class="form-control <?= (validation_show_error('hp_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('hp_ib') ? old('hp_ib') : ($tb_ibu['hp_ib'] ? $tb_ibu['hp_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('hp_ib')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Telp Kantor<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tlpkntr_ib" class="form-control <?= (validation_show_error('tlpkntr_ib')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tlpkntr_ib') ? old('tlpkntr_ib') : ($tb_ibu['tlpkntr_ib'] ? $tb_ibu['tlpkntr_ib'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tlpkntr_ib')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Keterangan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('ket_ib')) ? 'is-invalid' : ''; ?>" name="ket_ib" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_ket as $data) :
                                                if (old('ket_ib')) {
                                                    $validate = old('ket_ib');
                                                } else {
                                                    $validate = $tb_ibu['ket_ib'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('ket_ib')); ?>
                                        </div>
                                    </div>
                                </div>





                                <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 9 wali -->
        <div class="card">
            <div class="card-header" id="headingNine">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        <b class="<?= ($tb_wali['status'] == "1") ? 'text-success' : ''; ?>">#9 KETERANGAN TENTANG WALI</b>
                    </button>
                </h2>
            </div>
            <div id="collapseNine" class="collapse <?= ($page == 9) ? 'show' : ''; ?>" aria-labelledby="headingNine" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <p class="text-danger">Perhatian</p>
                        <p class="mb-5"><b>Kosongkan</b> formulir jika <b>tidak ada wali</b> dalam keluarga!, tetap tekan tombol <b>simpan</b> sampai judul berubah menjadi hijau</p>
                        <?php if (session()->getFlashdata('pesan9')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan9'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <form action="/user/editWali/<?= $tb_wali['id']; ?>" method="post">
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                                <?= csrf_field(); ?>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Nama Lengkap Tanpa Gelar</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nm_wl" class="form-control <?= (validation_show_error('nm_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('nm_wl') ? old('nm_wl') : ($tb_wali['nm_wl'] ? $tb_wali['nm_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nm_wl')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Nomor Induk Kependudukan (NIK)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nik_wl" class="form-control <?= (validation_show_error('nik_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('nik_wl') ? old('nik_wl') : ($tb_wali['nik_wl'] ? $tb_wali['nik_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('nik_wl')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Tempat & Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="tmplhr_wl" class="form-control <?= (validation_show_error('tmplhr_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tmplhr_wl') ? old('tmplhr_wl') : ($tb_wali['tmplhr_wl'] ? $tb_wali['tmplhr_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tmplhr_wl')); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgllhr_wl" class="form-control <?= (validation_show_error('tgllhr_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tgllhr_wl') ? old('tgllhr_wl') : ($tb_wali['tgllhr_wl'] ? $tb_wali['tgllhr_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tgllhr_wl')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Agama</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('agama_wl')) ? 'is-invalid' : ''; ?>" name="agama_wl" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_agama as $data) :
                                                if (old('agama_wl')) {
                                                    $validate = old('agama_wl');
                                                } else {
                                                    $validate = $tb_wali['agama_wl'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('agama_wl')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Kewarganegaraan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="wrg_wl" class="form-control <?= (validation_show_error('wrg_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('wrg_wl') ? old('wrg_wl') : ($tb_wali['wrg_wl'] ? $tb_wali['wrg_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('wrg_wl')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Pendidikan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('pend_wl')) ? 'is-invalid' : ''; ?>" name="pend_wl" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_pendidikan as $data) :
                                                if (old('pend_wl')) {
                                                    $validate = old('pend_wl');
                                                } else {
                                                    $validate = $tb_wali['pend_wl'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('pend_wl')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Pekerjaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="peker_wl" class="form-control <?= (validation_show_error('peker_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('peker_wl') ? old('peker_wl') : ($tb_wali['peker_wl'] ? $tb_wali['peker_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('peker_wl')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Penghasilan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('penghs_wl')) ? 'is-invalid' : ''; ?>" name="penghs_wl" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_penhasilan as $data) :
                                                if (old('penghs_wl')) {
                                                    $validate = old('penghs_wl');
                                                } else {
                                                    $validate = $tb_wali['penghs_wl'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('penghs_wl')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Alamat</label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat_wl" class="form-control <?= (validation_show_error('alamat_wl')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="3"><?= old('alamat_wl') ? old('alamat_wl') : ($tb_wali['alamat_wl'] ? $tb_wali['alamat_wl'] : ''); ?></textarea>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('alamat_wl')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Telp Rumah</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tlprmh_wl" class="form-control <?= (validation_show_error('tlprmh_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tlprmh_wl') ? old('tlprmh_wl') : ($tb_wali['tlprmh_wl'] ? $tb_wali['tlprmh_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tlprmh_wl')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Handphone</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="hp_wl" class="form-control <?= (validation_show_error('hp_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('hp_wl') ? old('hp_wl') : ($tb_wali['hp_wl'] ? $tb_wali['hp_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('hp_wl')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">No. Telp Kantor</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tlpkntr_wl" class="form-control <?= (validation_show_error('tlpkntr_wl')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('tlpkntr_wl') ? old('tlpkntr_wl') : ($tb_wali['tlpkntr_wl'] ? $tb_wali['tlpkntr_wl'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('tlpkntr_wl')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Keterangan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('ket_wl')) ? 'is-invalid' : ''; ?>" name="ket_wl" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($array_ket as $data) :
                                                if (old('ket_wl')) {
                                                    $validate = old('ket_wl');
                                                } else {
                                                    $validate = $tb_wali['ket_wl'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('ket_wl')); ?>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 10 prestasi -->
        <div class="card">
            <div class="card-header" id="headingTen">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        <b class="<?= ($tb_prestasi['status'] == "1") ? 'text-success' : ''; ?>">#10 KETERANGAN PRESTASI TERAKHIR YANG PERNAH DIMILIKI SISWA</b>
                    </button>
                </h2>
            </div>
            <div id="collapseTen" class="collapse <?= ($page == 10) ? 'show' : ''; ?>" aria-labelledby="headingTen" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan10')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan10'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <form action="/user/editPrestasi/<?= $tb_prestasi['id']; ?>" method="post">
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="user_hash" value="<?= $user_hash ?>">
                                <?= csrf_field(); ?>
                                <h5 class="mt-3 mb-2 text-primary"> <b>Akademik</b></h5>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Jenis Lomba</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="jns_lmak" class="form-control <?= (validation_show_error('jns_lmak')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('jns_lmak') ? old('jns_lmak') : ($tb_prestasi['jns_lmak'] ? $tb_prestasi['jns_lmak'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jns_lmak')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Penyelenggara</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pny_lmak" class="form-control <?= (validation_show_error('pny_lmak')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('pny_lmak') ? old('pny_lmak') : ($tb_prestasi['pny_lmak'] ? $tb_prestasi['pny_lmak'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('pny_lmak')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Tingkat</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('ting_lmak')) ? 'is-invalid' : ''; ?>" name="ting_lmak" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $array_tingkat = ['Kota', 'Provinsi', 'Nasional'];
                                            foreach ($array_tingkat as $data) :
                                                if (old('ting_lmak')) {
                                                    $validate = old('ting_lmak');
                                                } else {
                                                    $validate = $tb_prestasi['ting_lmak'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('ting_lmak')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Juara</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="jra_lmak" class="form-control <?= (validation_show_error('jra_lmak')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('jra_lmak') ? old('jra_lmak') : ($tb_prestasi['jra_lmak'] ? $tb_prestasi['jra_lmak'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jra_lmak')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Mendapatkan Sertivikat</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('serti_lmak')) ? 'is-invalid' : ''; ?>" name="serti_lmak" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $array_serti = ['Ya', 'Tidak'];
                                            foreach ($array_serti as $data) :
                                                if (old('serti_lmak')) {
                                                    $validate = old('serti_lmak');
                                                } else {
                                                    $validate = $tb_prestasi['serti_lmak'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('serti_lmak')); ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h5 class="mt-3 mb-2 text-primary"> <b>Non Akademik</b></h5>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Jenis Lomba</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="jns_lmnak" class="form-control <?= (validation_show_error('jns_lmnak')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('jns_lmnak') ? old('jns_lmnak') : ($tb_prestasi['jns_lmnak'] ? $tb_prestasi['jns_lmnak'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jns_lmnak')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Penyelenggara</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pny_lmnak" class="form-control <?= (validation_show_error('pny_lmnak')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('pny_lmnak') ? old('pny_lmnak') : ($tb_prestasi['pny_lmnak'] ? $tb_prestasi['pny_lmnak'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('pny_lmnak')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Tingkat</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('ting_lmnak')) ? 'is-invalid' : ''; ?>" name="ting_lmnak" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $array_tingkat = ['Kota', 'Provinsi', 'Nasional'];
                                            foreach ($array_tingkat as $data) :
                                                if (old('ting_lmnak')) {
                                                    $validate = old('ting_lmnak');
                                                } else {
                                                    $validate = $tb_prestasi['ting_lmnak'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('ting_lmnak')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Juara</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="jra_lmnak" class="form-control <?= (validation_show_error('jra_lmnak')) ? 'is-invalid' : ''; ?>" id="input" value="<?= old('jra_lmnak') ? old('jra_lmnak') : ($tb_prestasi['jra_lmnak'] ? $tb_prestasi['jra_lmnak'] : ''); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('jra_lmnak')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input" class="col-sm-4 col-form-label ">Mendapatkan Sertivikat</label>
                                    <div class="col-sm-8">
                                        <select class="form-control <?= (validation_show_error('serti_lmnak')) ? 'is-invalid' : ''; ?>" name="serti_lmnak" id="inputAddress">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $array_serti = ['Ya', 'Tidak'];
                                            foreach ($array_serti as $data) :
                                                if (old('serti_lmnak')) {
                                                    $validate = old('serti_lmnak');
                                                } else {
                                                    $validate = $tb_prestasi['serti_lmnak'];
                                                }
                                            ?>
                                                <option value="<?= $data; ?>" <?= ($validate == $data) ? 'selected' : '' ?>><?= $data; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= (validation_show_error('serti_lmnak')); ?>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 11 file -->
        <div class="card">
            <div class="card-header" id="headingEleven">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                        <b class="<?= ($tb_file['status'] == "1") ? 'text-success' : ''; ?>">#11 BEKAS PENDUKUNG</b>
                    </button>
                </h2>
            </div>
            <div id="collapseEleven" class="collapse <?= ($page == 11) ? 'show' : ''; ?>" aria-labelledby="headingEleven" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="px-0 px-lg-5">
                        <?php if (session()->getFlashdata('pesan11')) :  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan11'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;  ?>
                        <form action="/user/editFile/<?= $tb_file['id']; ?>" method="post" enctype="multipart/form-data">
                            <fieldset <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?>>
                                <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                                <input type="hidden" name="fullname" value="<?= user()->fullname; ?>">
                                <input type="hidden" name="id_pendaftaran" value="<?= $tb_file['id_daftar'] ?>">
                                <input type="hidden" name="kk_lama" value="<?= $tb_file['kk_file'] ?>">
                                <input type="hidden" name="foto_lama" value="<?= $tb_file['foto_file'] ?>">
                                <input type="hidden" name="akte_lama" value="<?= $tb_file['akte_file'] ?>">
                                <input type="hidden" name="nisn_lama" value="<?= $tb_file['nisn_file'] ?>">
                                <input type="hidden" name="serti1_lama" value="<?= $tb_file['serti1_file'] ?>">
                                <input type="hidden" name="serti2_lama" value="<?= $tb_file['serti2_file'] ?>">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Foto 2 x 3 Terbaru</h6>
                                        <div class="form-outline mb-4">
                                            <label class="form-label label-file label_foto" for="file_foto" style="<?= ($tb_file['foto_file']) ? 'background-image:url(/assets/foto/' . $tb_file['foto_file'] . ')' : 'background-image:none;'; ?>">Upload Foto 2 x 3</label>

                                            <input class=" form-control-file d-none <?= (validation_show_error('file_foto')) ? 'is-invalid' : ''; ?>" type="file" name="file_foto" id="file_foto" onchange="previewfoto();">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('file_foto')); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h6>Kartu Keluarga</h6>
                                        <div class="form-outline mb-4">
                                            <label class="form-label label-file label_kk" for="file_kk" style="<?= ($tb_file['kk_file']) ? 'background-image:url(/assets/kk/' . $tb_file['kk_file'] . ')' : 'background-image:none;'; ?>">Upload Kartu Keluarga</label>

                                            <input class=" form-control-file d-none <?= (validation_show_error('file_kk')) ? 'is-invalid' : ''; ?>" type="file" name="file_kk" id="file_kk" onchange="previewkk();">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('file_kk')); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h6>Akte Kelahiran</h6>
                                        <div class="form-outline mb-4">
                                            <label class="form-label label-file label_akte" for="file_akte" style="<?= ($tb_file['akte_file']) ? 'background-image:url(/assets/akte/' . $tb_file['akte_file'] . ')' : 'background-image:none;'; ?>">Upload Akte Kelahiran</label>

                                            <input class=" form-control-file d-none <?= (validation_show_error('file_akte')) ? 'is-invalid' : ''; ?>" type="file" name="file_akte" id="file_akte" onchange="previewakte();">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('file_akte')); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h6>Kartu NISN</h6>
                                        <div class="form-outline mb-4">
                                            <label class="form-label label-file label_nisn" for="file_nisn" style="<?= ($tb_file['nisn_file']) ? 'background-image:url(/assets/nisn/' . $tb_file['nisn_file'] . ')' : 'background-image:none;'; ?>">Upload Kartu NISN</label>

                                            <input class=" form-control-file d-none <?= (validation_show_error('file_nisn')) ? 'is-invalid' : ''; ?>" type="file" name="file_nisn" id="file_nisn" onchange="previewnisn();">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('file_nisn')); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h6>Sertifikat Prestasi Akademik</h6>
                                        <div class="form-outline mb-4">
                                            <label class="form-label label-file label_serti1" for="file_serti1" style="<?= ($tb_file['serti1_file']) ? 'background-image:url(/assets/sertifikat/' . $tb_file['serti1_file'] . ')' : 'background-image:none;'; ?>">Upload Sertifikat</label>

                                            <input class=" form-control-file d-none <?= (validation_show_error('file_serti1')) ? 'is-invalid' : ''; ?>" type="file" name="file_serti1" id="file_serti1" onchange="previewserti1();">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('file_serti1')); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h6>Sertifikat Prestasi Non Akademik</h6>
                                        <div class="form-outline mb-4">
                                            <label class="form-label label-file label_serti2" for="file_serti2" style="<?= ($tb_file['serti2_file']) ? 'background-image:url(/assets/sertifikat/' . $tb_file['serti2_file'] . ')' : 'background-image:none;'; ?>">Upload Sertifikat</label>

                                            <input class=" form-control-file d-none <?= (validation_show_error('file_serti2')) ? 'is-invalid' : ''; ?>" type="file" name="file_serti2" id="file_serti2" onchange="previewserti2();">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('file_serti2')); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>







                                <input type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Pastikan kembali data yang anda inputkan Sudah BENAR !, Tetap Meyimpan ?');">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#exampleModal" <?= ($tb_daftar['status'] == '0') ? '' : 'disabled'; ?> <?= (($tb_siswa['status'] == '1') && ($tb_saudara['status'] == '1') && ($tb_tmpttgl['status'] == '1') && ($tb_jamsos['status'] == '1') && ($tb_kesehatan['status'] == '1') && ($tb_asalskl['status'] == '1') && ($tb_ayah['status'] == '1') && ($tb_ibu['status'] == '1') && ($tb_wali['status'] == '1') && ($tb_prestasi['status'] == '1') && ($tb_file['status'] == '1')) ? '' : 'disabled'; ?>>
        Serahkan Formulir
    </button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Serahkan Formulir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/user/serahkan/<?= $tb_daftar['id']; ?>">
                    <input type="hidden" name="id_daftar" value="<?= user()->id; ?>">
                    <div class="modal-body">
                        <b>Pastikan kembali</b> data yang anda inputkan pada formulir <b>Sudah Benar!</b>
                        Formulir yang sudah diserahkan tidak dapat diubah kembali!

                        <div class="form-group form-check mt-4">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Setuju</label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Serahkan">
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<?php $this->endSection();  ?>