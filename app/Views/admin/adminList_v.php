<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between mb-1">
        <div class="col-md-5">
            <h1 class="h3 mb-2 text-gray-800"><?= $text; ?></h1>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/admin/addAdmin'); ?>" class="btn btn-primary btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add</span>
            </a>

        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $text  ?></li>
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
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admin as $data) :  ?>
                            <tr>
                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['username']; ?>
                                </td>
                                <td>
                                    <?= $data['email']; ?>
                                </td>
                                <td>
                                    <?= $data['role']; ?>
                                </td>
                                <td>
                                    <?php $id_hash = base64_encode($data['id_user'])  ?>
                                    <a href="/admin/userList/<?= $id_hash ?>" class="btn btn-warning">Edit</a>
                                    <form action="/admin/userList/<?= $data['id_user']; ?>" method="post" class="d-inline">
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