<?php $this->extend('tamplate/tamplateweb'); ?>

<?php $this->section('content');  ?>
<div class="bg bg-info d-flex align-items-center" style="height: 100vh;">
    <div class="container ">
        <div class="row">
            <div class="col">
                <H1>Contact</H1>
                <h5>Phone :</h5>
                <h6>09803833833</h6>
            </div>
            <div class="col">
                <div class="card p-4">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nama" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Message</label>
                        <textarea class="form-control" id="pesan" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->endSection();  ?>