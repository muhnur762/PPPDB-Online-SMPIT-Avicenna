<?php $this->extend('tamplate/admin/index')  ?>

<?php $this->section('content')  ?>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-2 text-gray">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;  ?>
    <div class="row">
        <div class="col mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
                </div>
                <div class="card-body">
                    <h4 class="font-weight-bold" style="font-family: 'Bebas Neue', sans-serif;">ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ</h4>
                    <p>Selamat datang di Portal PPDB SMPIT AVICENNA</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection();  ?>