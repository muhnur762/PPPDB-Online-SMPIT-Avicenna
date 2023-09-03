<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Message</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Message</li>
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
                            <th>NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($pesan as $data) :  ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $data['nama']; ?>
                                </td>
                                <td>
                                    <?= $data['email']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($data['status'] == '1') {
                                    ?>
                                        <a href="/admin/editPesan/<?= $data['id']; ?>" class="btn btn-success">Balas</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="/admin/editPesan/<?= $data['id']; ?>" class="btn btn-danger">Lihat</a>
                                    <?php
                                    }
                                    ?>
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