<?php $this->extend('tamplate/admin/index')  ?>

<?php $this->section('content')  ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-2 text-gray">My Profile</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-xl-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
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
                    <div class="row">

                        <div class="col-xl-6">
                            <img class="img-profile rounded-sircle w-50 d-flex mx-auto" src="<?= base_url(); ?>assets/img-nav/undraw_profile.svg">
                        </div>

                        <div class="col-xl-6">
                            <form action="/user/updateProfile/<?= $admin['id_user']; ?>" method="post">
                                <?= csrf_field(); ?>

                                <input type="hidden" name="id_user" value="<?= $admin['id_user']; ?>">

                                <div class="form-group">
                                    <label for="inputAddress">Name</label>
                                    <input type="text" name="fullname" class="form-control <?= (validation_show_error('fullname')) ? 'is-invalid' : ''; ?>" id="inputAddress" placeholder="Full Name" value="<?= (old('fullname')) ? old('fullname') : $admin['fullname']; ?>">

                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= (validation_show_error('fullname')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Username</label>
                                    <input type="text" name="username" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="inputAddress2" placeholder="Username" value="<?= (old('username')) ? old('username') : $admin['username']; ?>">

                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= (validation_show_error('username')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="inputEmail4" placeholder="Email" value="<?= (old('email')) ? old('email') : $admin['email']; ?>">

                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= (validation_show_error('email')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Role</label>
                                    <input type="text" name="role" class="form-control " id="inputEmail4" placeholder="Email" value="<?= $admin['role']; ?>" readonly>
                                </div>


                                <button type="submit" class="btn btn-primary" onclick="confirm('Are you sure to change this data ?')">Save</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
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
                    <form action="/user/gantiPassword/<?= $admin['id_user']; ?>" method="post">
                        <input type="hidden" name="username" value="<?= $admin['username']; ?>">
                        <div class="form-group">
                            <label for="inputpassword">Old password</label>
                            <input type="password" name="oldpassword" class="form-control <?= (validation_show_error('oldpassword')) ? 'is-invalid' : ''; ?>" id="inputpassword">

                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= (validation_show_error('oldpassword')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputpassword">Password</label>
                            <input type="password" name="password" class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : ''; ?>" id="inputpassword">

                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= (validation_show_error('password')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control <?= (validation_show_error('confirmpassword')) ? 'is-invalid' : ''; ?>" id="confirmpassword">

                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= (validation_show_error('confirmpassword')); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure to change this data ?')">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php $this->endSection();  ?>