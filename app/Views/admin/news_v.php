<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between mb-1">
        <div class="col-md-3">
            <h1 class="h3 mb-2 text-gray-800">News</h1>
        </div>
        <div class="col-md-2">
            <a href="/admin/addNews" class="btn btn-primary btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add News</span>
            </a>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Website</a></li>
            <li class="breadcrumb-item active" aria-current="page">News</li>
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
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blog as $data) :  ?>
                            <tr>
                                <td><img src="<?= base_url('assets/cover/' . $data['cover']) ?>" alt="<?= $data['cover']; ?>" style="width: 100px;"></td>
                                <td>
                                    <?= $data['judul']; ?>
                                </td>
                                <td>
                                    <?= $data['kategori']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td align="center">
                                    <a href="/admin/news/<?= $data['slug']; ?>" class="btn btn-primary">Detail</a>
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