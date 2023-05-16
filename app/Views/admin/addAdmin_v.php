<?php
$this->extend('tamplate/admin/index');
$this->section('content');
?>
<div class="container-fluid">
    <h1 class="h3 m-3 text-gray-800">Add</h1>


    <div class="shadow rounded bg-light m-3 p-5">

        <form action="saveAdmin" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="inputEmail4" placeholder="Email" value="<?= old('email') ?>">

                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= (validation_show_error('email')); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Role</label>
                    <select id="inputState" class="form-control" name="role">
                        <?php
                        $role = array("Super Admin", "Admin", "User");
                        foreach ($role as $r) :
                        ?>
                            <option value="<?= strtolower($r); ?>" <?= (old('role')) ? 'selected' : '' ?>><?= $r; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Name</label>
                <input type="text" name="name" class="form-control <?= (validation_show_error('name')) ? 'is-invalid' : ''; ?>" id="inputAddress" placeholder="Full Name" value="<?= old('name') ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('name')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Username</label>
                <input type="text" name="username" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="inputAddress2" placeholder="Username" value="<?= old('username') ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('username')); ?>
                </div>
            </div>
            <p class="text-danger">Defauld Password "avicenna123"</p>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </form>


    </div>

</div>
<?php $this->endSection();  ?>