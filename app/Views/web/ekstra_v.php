<?php $this->extend('tamplate/sidebar');  ?>
<?php $this->section('contentMain');  ?>
<h1 class="warna">Ekstrakulikuler</h1>
<hr>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ekstrakulikuler</li>
</ol>
<div class="isi">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="cardE">
                    <h1>Lorem</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, enim.</p>
                    <span>Hover Here</span>
                    <div class="pic" style="background-image: url(assets/other/defauld.jpg);"></div>
                    <button></button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cardE">
                    <h1>Pramuka</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, enim.</p>
                    <span>Hover Here</span>
                    <div class="pic" style="background-image: url(assets/other/avc.jpg);"></div>
                    <button></button>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->endSection();  ?>