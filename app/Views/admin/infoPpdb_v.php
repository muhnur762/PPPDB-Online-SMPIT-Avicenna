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
                            <th style="padding-right:100px">Title</th>
                            <th style="padding-right:300px">isi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ppdb as $data) :
                        ?>
                            <tr>
                                <?= csrf_field(); ?>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $data['judul']; ?>
                                </td>
                                <td>
                                    <?= ($data['isi']) ? $data['isi'] : "<p class='text-danger'>Klik Edit Untuk mengisi !</p>"; ?>
                                </td>
                                <td align="center">
                                    <!-- Button edit -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data['id'] ?>">
                                        Edit

                                    </button>

                                    <div class="modal fade" id="edit<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/updateTimeline/<?= $data['id']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label text-left" for="form6Example1">Judul</label>
                                                            <input type="text" name="judul" id="form6Example1" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" value="<?= (old('judul')) ? old('judul') : $data['judul']; ?>" required autofocus />
                                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                                <?= (validation_show_error('judul')); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label" for="form6Example7">Isi</label>
                                                            <textarea class="form-control <?= (validation_show_error('isi')) ? 'is-invalid' : ''; ?>" name="isi" rows="4" required><?= (old('isi')) ? old('isi') : $data['isi']; ?></textarea>
                                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                                <?= (validation_show_error('isi')); ?>
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" value="Save" class="btn btn-primary" id="">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <form action="/admin/timeLine/<?= $data['id']; ?>" method="post" class=" d-inline-block mt-1">
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