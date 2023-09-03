<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between mb-1">
        <div class="col-md-3">
            <h1 class="h3 mb-2 text-gray-800">Pengumuman</h1>
        </div>

    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">PPDB</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal Pengumuman</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;  ?>
            <form action="/admin/updatePeng/<?= $dtPengumuman['id']; ?>" method="post">
                <?php csrf_field()  ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col" width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <input class="form-control " type="datetime-local" name="tanggal" value="<?= $dtPengumuman['tanggal']; ?>" required>


                            </th>
                            <td>

                                <?php
                                if ($dtPengumuman['status'] == '1') {
                                    echo ('Not Set');
                                } else {
                                    echo ('On Going');
                                }
                                ?>
                            </td>
                            <td align="center">
                                <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
            </form>
            <form action="/admin/resetPeng/<?= $dtPengumuman['id']; ?>" method="post" class="d-inline">
                <input type="submit" class="btn btn-danger btn-sm" value="Reset">
            </form>
            </td>
            </tr>
            </tbody>
            </table>

        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan2')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan2'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;  ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="padding-right:100px">ID</th>
                        <th style="padding-right:300px">Name</th>
                        <th style="padding-right:300px">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tb_daftar as $data) :
                    ?>
                        <tr>
                            <form action="/admin/aupdateKelulusan/<?= $data['id_daftar']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    #227<?= date('ymd', strtotime($data['tgl_daftar'])) . $data['id_daftar'] ?>
                                </td>
                                <td>
                                    <?= $data['nama_siswa']; ?>
                                </td>
                                <td align="center">

                                    <select class="form-control" name="keterangan" value="<?= old('keterangan'); ?>">
                                        <?php
                                        $keterangan = array("Lulus", "Cadangan", "Tidak Lulus");
                                        foreach ($keterangan as $k) :
                                            if (old('kategori')) {
                                                $validate = old('kategori');
                                            } else {
                                                $validate = $data['keterangan'];
                                            }
                                        ?>
                                            <option value="<?= $k; ?>" <?= ($validate == $k) ? 'selected' : '' ?>><?= $k; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>

                                </td>
                                <td align="center">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<?php $this->endSection();  ?>