<?php $this->extend('tamplate/tamplateweb'); ?>

<?php $this->section('content');  ?>
<!-- paralax -->
<div class="banner">

    <img class="layer-1 gambar" src="assets/banner/background.png" alt="background">
    <img class="layer-2 gambar" src="assets/banner/1.png" alt="background">
    <div class="layer-3" data-aos="fade-down">
        <img src="assets/other/logoavc.png" class="w-25" alt="Logo Avc">
        <h1>SMPIT AVICENNA</h1>
        <p>Mulia Dalam Akhlak Unggul Dalam Prestasi</p>
    </div>
    <img class="layer-4 gambar" src="assets/banner/2.png" alt="background">
    <img class="layer-5 gambar" src="assets/banner/3.png" alt="background">
    <img class="layer-6 gambar" src="assets/banner/4.png" alt="background">
</div>
<!-- end paralax -->

<!-- content home -->
<div class="content">

    <!-- about -->
    <section class="about px-md-0 px-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right">
                    <img src="assets/other/logoavc.png" alt="logo Avicenna" class="w-50 d-block mx-auto mb-3">
                </div>
                <div class="col-md-6 text-dark d-block my-auto isi-about" data-aos="fade-left">
                    <h5>Welcome To</h5>
                    <h3 class="warna fw-bold">SMPIT AVICENNA</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus maiores id soluta molestiae nam ipsum esse reprehenderit impedit totam voluptates! Repudiandae, laboriosam! Possimus accusamus voluptatem consectetur beatae obcaecati voluptatibus fugit.</p>
                    <a href="/profile" class="mybtn d-block mx-auto mx-md-0" style="width: fit-content;">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- amd about -->

    <!-- wave -->
    <div class="wave atas">
        <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 160" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(2255, 255, 255, 1)" offset="100%"></stop>
                    <!-- <stop stop-color="rgba(230, 230, 230, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(230, 230, 230, 1)" offset="100%"></stop> -->
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,64L80,53.3C160,43,320,21,480,18.7C640,16,800,32,960,50.7C1120,69,1280,91,1440,101.3C1600,112,1760,112,1920,109.3C2080,107,2240,101,2400,101.3C2560,101,2720,107,2880,104C3040,101,3200,91,3360,72C3520,53,3680,27,3840,29.3C4000,32,4160,64,4320,69.3C4480,75,4640,53,4800,45.3C4960,37,5120,43,5280,37.3C5440,32,5600,16,5760,26.7C5920,37,6080,75,6240,93.3C6400,112,6560,112,6720,101.3C6880,91,7040,69,7200,74.7C7360,80,7520,112,7680,109.3C7840,107,8000,69,8160,66.7C8320,64,8480,96,8640,106.7C8800,117,8960,107,9120,93.3C9280,80,9440,64,9600,64C9760,64,9920,80,10080,80C10240,80,10400,64,10560,64C10720,64,10880,80,11040,77.3C11200,75,11360,53,11440,42.7L11520,32L11520,160L11440,160C11360,160,11200,160,11040,160C10880,160,10720,160,10560,160C10400,160,10240,160,10080,160C9920,160,9760,160,9600,160C9440,160,9280,160,9120,160C8960,160,8800,160,8640,160C8480,160,8320,160,8160,160C8000,160,7840,160,7680,160C7520,160,7360,160,7200,160C7040,160,6880,160,6720,160C6560,160,6400,160,6240,160C6080,160,5920,160,5760,160C5600,160,5440,160,5280,160C5120,160,4960,160,4800,160C4640,160,4480,160,4320,160C4160,160,4000,160,3840,160C3680,160,3520,160,3360,160C3200,160,3040,160,2880,160C2720,160,2560,160,2400,160C2240,160,2080,160,1920,160C1760,160,1600,160,1440,160C1280,160,1120,160,960,160C800,160,640,160,480,160C320,160,160,160,80,160L0,160Z"></path>
        </svg>
    </div>
    <!-- wave -->

    <!-- bolg -->
    <div class="blog">
        <div class="container">

            <!-- banner -->

            <div class="banner-2" data-aos="fade-up">
                <img src="assets/other/<?= $banner[0]['image']; ?>" alt="" class="w-100">
            </div>
            <!-- end Banner -->

            <div class="blog-card" data-aos="fade-up">
                <h1 class="judul-utama mt-5">Lates News</h1>
                <div class="row d-flex justify-content-center">
                    <?php foreach ($blog as $data) :  ?>
                        <div class="col-lg-4 col-md-6 d-flex justify-content-center mb-4">
                            <a href="news/<?= $data['slug']; ?>" class="myhover">
                                <div class="card mycard shadow" style="width: 20rem; height:25rem">
                                    <img src="assets/cover/<?= $data['cover']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $data['judul']; ?></h5>
                                        <p class="card-ket"><?= $data['penulis']; ?> | <?= date('d M Y', strtotime($data['created_at'])); ?></p>
                                        <div class="card-text"><?= $data['isi']; ?></div>
                                    </div>
                                    <div class="kategori">
                                        <p><?= $data['kategori']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;  ?>

                </div>
                <div class="row mt-3">
                    <div class="col d-flex justify-content-center">
                        <a href="/news" class="mybtn">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end blog -->

    <!-- pengumuman -->
    <div class="pengumuman py-5 px-md-0 px-3">
        <div class="container" data-aos="fade-up">
            <h1 class="judul-utama mb-3">Announcement</h1>
            <div class="row">
                <div class="col-lg-6 ">
                    <?php $no = 1;  ?>
                    <?php foreach ($pengumuman as $data) :  ?>
                        <a href="news/<?= $data['slug']; ?>" class="text-decoration-none text-dark ">
                            <div class="row mb-2 myhover">
                                <div class="col-2">
                                    <div class="nomor">
                                        <h5 class="shadow"><?= $no; ?></h5>
                                    </div>
                                </div>
                                <div class="col-10 ">
                                    <div class="isi-pengumuman shadow d-flex align-items-center">
                                        <p class="">
                                            <?= $data['judul']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php $no++  ?>
                    <?php endforeach;  ?>

                    <div class=" row mt-3">
                        <div class="col d-flex justify-content-center">
                            <a href="/pengumuman" class="mybtn rounded-pill">view more</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 img-pengumuman">
                    <img src="<?= base_url('assets/other/pengumuman.png'); ?>" class="w-50 d-block mx-auto" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- end pengumuman -->

    <!-- Program Unggulan -->
    <div class="program">
        <div class="wave bawah" id="program">
            <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 230" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                        <stop stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop>
                        <stop stop-color="rgba(255, 255, 255, 1)" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,161L80,145.7C160,130,320,100,480,84.3C640,69,800,69,960,76.7C1120,84,1280,100,1440,122.7C1600,146,1760,176,1920,157.2C2080,138,2240,69,2400,46C2560,23,2720,46,2880,57.5C3040,69,3200,69,3360,57.5C3520,46,3680,23,3840,11.5C4000,0,4160,0,4320,7.7C4480,15,4640,31,4800,42.2C4960,54,5120,61,5280,76.7C5440,92,5600,115,5760,107.3C5920,100,6080,61,6240,61.3C6400,61,6560,100,6720,107.3C6880,115,7040,92,7200,80.5C7360,69,7520,69,7680,76.7C7840,84,8000,100,8160,122.7C8320,146,8480,176,8640,191.7C8800,207,8960,207,9120,172.5C9280,138,9440,69,9600,34.5C9760,0,9920,0,10080,26.8C10240,54,10400,107,10560,111.2C10720,115,10880,69,11040,65.2C11200,61,11360,100,11440,118.8L11520,138L11520,230L11440,230C11360,230,11200,230,11040,230C10880,230,10720,230,10560,230C10400,230,10240,230,10080,230C9920,230,9760,230,9600,230C9440,230,9280,230,9120,230C8960,230,8800,230,8640,230C8480,230,8320,230,8160,230C8000,230,7840,230,7680,230C7520,230,7360,230,7200,230C7040,230,6880,230,6720,230C6560,230,6400,230,6240,230C6080,230,5920,230,5760,230C5600,230,5440,230,5280,230C5120,230,4960,230,4800,230C4640,230,4480,230,4320,230C4160,230,4000,230,3840,230C3680,230,3520,230,3360,230C3200,230,3040,230,2880,230C2720,230,2560,230,2400,230C2240,230,2080,230,1920,230C1760,230,1600,230,1440,230C1280,230,1120,230,960,230C800,230,640,230,480,230C320,230,160,230,80,230L0,230Z"></path>
            </svg>
        </div>
        <div class="container pb-5 px-md-0 px-4 " data-aos="fade-up">
            <h1 class="judul-utama putih text-light">Our Programe</h1>
            <div class="row">
                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                1
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Program Tahsin dengan Metode Talaqqi</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                2
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Program Tahfidz 2-3 Juz</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                3
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Bina Pribadi Islam (BPI)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                4
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Penerapan Kurikulum SIT dan Kurikulum merdeka Belajar</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                5
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Public Speaking (Arab & Inggris)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                6
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Program Takhossus Al-Qur'an 5-6 Juz</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                7
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Karakter Buiding</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 no-program">
                            <h4>
                                8
                            </h4>
                        </div>
                        <div class="col-lg-10 isi-program">
                            <p>Program syahadah Al-Qur'an</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end program Unggulan -->
    <!-- vidio -->
    <div class="vidio">
        <!-- wave -->
        <div class="wave bawah">
            <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 300" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="sw-gradient-3" x1="0" x2="0" y1="1" y2="0">
                        <stop stop-color="rgba(76, 77, 153, 1)" offset="0%"></stop>
                        <stop stop-color="rgba(76, 77, 153, 1)" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-3)" d="M0,270L80,270C160,270,320,270,480,240C640,210,800,150,960,150C1120,150,1280,210,1440,235C1600,260,1760,250,1920,250C2080,250,2240,260,2400,240C2560,220,2720,170,2880,155C3040,140,3200,160,3360,165C3520,170,3680,160,3840,170C4000,180,4160,210,4320,195C4480,180,4640,120,4800,115C4960,110,5120,160,5280,195C5440,230,5600,250,5760,255C5920,260,6080,250,6240,240C6400,230,6560,220,6720,180C6880,140,7040,70,7200,70C7360,70,7520,140,7680,160C7840,180,8000,150,8160,160C8320,170,8480,220,8640,210C8800,200,8960,130,9120,130C9280,130,9440,200,9600,225C9760,250,9920,230,10080,230C10240,230,10400,250,10560,245C10720,240,10880,210,11040,175C11200,140,11360,100,11440,80L11520,60L11520,300L11440,300C11360,300,11200,300,11040,300C10880,300,10720,300,10560,300C10400,300,10240,300,10080,300C9920,300,9760,300,9600,300C9440,300,9280,300,9120,300C8960,300,8800,300,8640,300C8480,300,8320,300,8160,300C8000,300,7840,300,7680,300C7520,300,7360,300,7200,300C7040,300,6880,300,6720,300C6560,300,6400,300,6240,300C6080,300,5920,300,5760,300C5600,300,5440,300,5280,300C5120,300,4960,300,4800,300C4640,300,4480,300,4320,300C4160,300,4000,300,3840,300C3680,300,3520,300,3360,300C3200,300,3040,300,2880,300C2720,300,2560,300,2400,300C2240,300,2080,300,1920,300C1760,300,1600,300,1440,300C1280,300,1120,300,960,300C800,300,640,300,480,300C320,300,160,300,80,300L0,300Z"></path>
            </svg>
        </div>
        <!-- wave -->

        <div class="container" style="box-sizing: border-box;">
            <h1 class="judul-utama" style="margin-top:-100px">Vidio</h1>

            <div class="parent-vidio">
                <div class="item">
                    <div class="responsive-vidio">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/g89I-FHB-6M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="item">
                    <div class="responsive-vidio">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/g89I-FHB-6M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="item">
                    <div class="responsive-vidio">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/g89I-FHB-6M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="item">
                    <div class="responsive-vidio">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/g89I-FHB-6M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="item">
                    <div class="responsive-vidio">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/g89I-FHB-6M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end vidio -->

</div>
<!-- end content home  -->
<?php $this->endSection();  ?>