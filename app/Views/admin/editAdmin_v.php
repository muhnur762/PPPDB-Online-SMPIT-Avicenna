<?php
$this->extend('tamplate/admin/index');
$this->section('content');
?>
<div class="container-fluid">
    <h1 class="h3 m-3 text-gray-800">Edit</h1>


    <div class="shadow rounded bg-light m-3 p-5">

        <form action="/admin/updateAdmin/<?= $admin[0]['id_user']; ?>" method="post">
            <?= csrf_field(); ?>

            <input type="hidden" name="id_user" value="<?= $admin[0]['id_user']; ?>">
            <input type="hidden" name="password" value="<?= $admin[0]['password_hash']; ?>">
            <input type="hidden" name="role" value="<?= $admin[0]['role']; ?>">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="inputEmail4" placeholder="Email" value="<?= (old('email')) ? old('email') : $admin[0]['email']; ?>">

                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= (validation_show_error('email')); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Role</label>
                    <select id="inputState" class="form-control" name="role">
                        <?php
                        if ($admin[0]['role'] == 'user') {
                            $role = array("user");
                        } else {
                            $role = array("super admin", "admin");
                        }

                        foreach ($role as $r) :
                            if (old('role')) {
                                $validate = old('role');
                            } else {
                                $validate = $admin[0]['role'];
                            }
                        ?>
                            <option value="<?= strtolower($r); ?>" <?= ($validate == $r) ? 'selected' : '' ?>><?= $r; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Name</label>
                <input type="text" name="fullname" class="form-control <?= (validation_show_error('fullname')) ? 'is-invalid' : ''; ?>" id="inputAddress" placeholder="Full Name" value="<?= (old('fullname')) ? old('fullname') : $admin[0]['fullname']; ?>">

                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('fullname')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Username</label>
                <input type="text" name="username" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="inputAddress2" placeholder="Username" value="<?= (old('username')) ? old('username') : $admin[0]['username']; ?>">

                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= (validation_show_error('username')); ?>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-inline">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to change this data ?');">Submit</button>
        </form>
    </div>
    <div class="d-inline">
        <?php
        if ($admin[0]['role'] == 'user') {
            $rute = 'userList';
        } else {
            $rute = 'adminList';
        }
        ?>
        <a href="<?= base_url('admin/' . $rute); ?>" class="btn btn-secondary">Back</a>

        <form action="/admin/resetPassword/<?= $admin[0]['id_user']; ?>" method="post" class="btn-danger d-inline">
            <input type="hidden" name="id_user" value="<?= $admin[0]['id_user']; ?>">
            <button type="submit" class="btn btn-danger d-inline" onclick="return confirm('Are you sure to reset this password ?');">Reset Password</button>
            <p class="text-danger mt-1">Defauld Password "avicenna123"</p>
        </form>

    </div>
</div>






</div>

</div>
<?php $this->endSection();  ?>