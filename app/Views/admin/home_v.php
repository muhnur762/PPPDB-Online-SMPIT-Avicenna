<?php $this->extend('tamplate/admin/index')  ?>

<?php $this->section('content')  ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>


    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Welcome</h6>
        </div>
        <div class="card-body">
            <h5>Hallo, <?= user()->fullname; ?></h5>
            <p>Selamat datang di dashboard Admin SMPIT Avicenna</p>
        </div>
    </div>

</div>
<?php $this->endSection();  ?>