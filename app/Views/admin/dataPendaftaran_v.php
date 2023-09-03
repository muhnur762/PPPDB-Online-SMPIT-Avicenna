<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pendaftaraan</li>
        </ol>
    </nav>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php if (session()->getFlashdata('pesan')) :  ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif;  ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($tb_daftar as $data) :  ?>
                            <tr>
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
                                    <?php
                                    if ($data['status'] == '1') {
                                    ?>
                                        <span class="btn btn-warning btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="text">Menunggu Verifikasi</span>
                                        </span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="btn btn-success btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Terverifiksi</span>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    <a href="/admin/detailDaftar/227<?= date('ymd', strtotime($data['tgl_daftar'])) . $data['id_daftar'] ?>" class="btn btn-primary btn-sm">Lihat</a>

                                    <button class="btn btn-sm btn-success mb-3 mb-md-0" onclick="window.open('<?= site_url('user/formulirPdf/' . base64_encode('ppdb-' . $data['id_daftar'])); ?>','blank')" <?= ($data['status'] == '2') ? '' : 'disabled'; ?>>Download</button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php $this->endSection();  ?>