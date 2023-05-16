<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- mycss -->
    <link rel="stylesheet" href="<?= base_url("/assets/css/styleAdmin.css"); ?>">
    <!-- icont -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bi bi-list' id="header-toggle"></i> </div>
        <div class="header_img"></div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="/" class="nav_logo"> <img style="width: 30px;" src="<?= base_url("assets/other/logoavc.png"); ?>" alt=""> <span class="nav_logo-name fw-bold">SMPIT AVICENNA</span> </a>
                <div class="nav_list">
                    <a href="/admin" class="nav_link"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Home</span> </a>
                    <a href="/admin/news" class="nav_link"> <i class='bi bi-newspaper nav_icon'></i> <span class="nav_name">News</span> </a>
                    <a href="/admin/foto" class="nav_link"> <i class='bi bi-images nav_icon'></i> <span class="nav_name">Images</span> </a>
                    <a href="/admin/banner" class="nav_link"> <i class='bi bi-card-image nav_icon'></i> <span class="nav_name">Banner</span> </a>
                    <a href="/admin/message" class="nav_link"> <i class='bi bi-chat-dots nav_icon'></i> <span class="nav_name">Message</span> </a>
                    <a href="#" class="nav_link"> <i class='bi bi-people nav_icon'></i> <span class="nav_name">Files</span> </a>
                    <a href="#" class="nav_link"> <i class='bi bi-box-arrow-left nav_icon'></i> <span class="nav_name">Stats</span> </a>
                </div>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <?php $this->renderSection('content')  ?>
    </div>
    <!--Container Main end-->
    <s src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <!-- myjs -->
        <script src="<?= base_url("assets/js/admin.js"); ?>"></script>
        <!-- ckeditor -->
        <script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
        <!-- <script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script> -->
        <script>
            CKEDITOR.replace('isi');
        </script>
</body>

</html>