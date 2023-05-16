<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between mb-1">
        <div class="col-md-3">
            <h1 class="h3 mb-2 text-gray-800">Time Line</h1>
        </div>
        <div class="col-md-2">
            <a href="/admin/addtimeLine" class="btn btn-primary btn-icon-split float-right">
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
            <li class="breadcrumb-item"><a href="#">PPDB</a></li>
            <li class="breadcrumb-item active" aria-current="page">Time Line</li>
        </ol>
    </nav>

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
                            <th>Title</th>
                            <th>isi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ppdb as $data) :
                        ?>
                            <tr>
                                <form action="/admin/updateTimeline/<?= $data['id']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <div class="form-outline">
                                            <input type="text" name="judul" id="form6Example1" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" value="<?= old('judul') ? old('judul') : ($data['judul'] ? $data['judul'] : ''); ?>" />
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('judul')); ?>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="form-outline mb-4">
                                            <textarea class="form-control <?= (validation_show_error('isi')) ? 'is-invalid' : ''; ?>" name="isi" rows="4"><?= old('isi') ? old('isi') : ($data['isi'] ? $data['isi'] : ''); ?></textarea>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (validation_show_error('isi')); ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Save">
                                </form>
                                <form action="/admin/timeLine/<?= $data['id']; ?>" method="post" class="">
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