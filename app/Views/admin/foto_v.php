<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between mb-3">
        <div class="col-md-3">
            <h1 class="h3 mb-2 text-gray-800">Images</h1>
        </div>
        <div class="col-md-2">
            <a href="/admin/addFoto" class="btn btn-primary btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Images</span>
            </a>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Website</a></li>
            <li class="breadcrumb-item active" aria-current="page">Images</li>
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
                            <th>Image</th>
                            <th>Caption</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($foto as $data) :  ?>
                            <tr>
                                <td><img src="<?= base_url('assets/img/' . $data['cover']) ?>" alt="<?= $data['cover']; ?>" style="width: 100px;"></td>
                                <td>
                                    <?= $data['caption']; ?>
                                </td>
                                <td>
                                    <?= $data['penulis']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td align="center">
                                    <?php $id_hash = base64_encode($data['id'])  ?>
                                    <a href="/admin/editFoto/<?= $id_hash ?>" class="btn btn-warning">Edit</a>
                                    <form action="/admin/foto/<?= $data['id']; ?>" method="post" class="d-inline-block mt-1">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you can delete this data?');">Delete</button>
                                    </form>
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