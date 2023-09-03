<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/stylePengumuman.css'); ?>">
    <title>Pengumuman</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    $tanggal = date('M d, Y H:i:s', strtotime($pengumuman['tanggal']));
    ?>

    <p id="demo"></p>
    <div class="container1">
        <div class="judul">
            <h2>Pengumuman Seleksi Penerimaan Peserta Didik Baru</h2>
            <h2>SMPIT AVICENNA</h2>
        </div>
        <br>
        <br>
        <div class="wrapper">
            <div class="item">
                <div class="number">
                    <span id="days">
                        00
                    </span>
                </div>
                <span class="title">Days</span>
            </div>
            <div class="item">
                <div class="number">
                    <span id="hours">
                        00
                    </span>
                </div>
                <span class="title">Hours</span>
            </div>
            <div class="item">
                <div class="number">
                    <span id="minutes">
                        00
                    </span>
                </div>
                <span class="title">Minutes</span>
            </div>
            <div class="item">
                <div class="number">
                    <span id="seconds">
                        00
                    </span>
                </div>
                <span class="title">Seconds</span>
            </div>
        </div>
        <br><br>
        <p style="font-size: 2rem;"><?= $tanggal; ?> WIB</p>
        <a href="<?= base_url('/logout'); ?>" class="fs-3 text-decoration-none">Keluar</a>
    </div>
    <div class="container2">
        <div class="judul">
            <h2>Pengumuman Seleksi Penerimaan Peserta Didik Baru</h2>
            <h2>SMPIT AVICENNA</h2>
        </div>
        <br>
        <br>
        <a href="<?= base_url('user/pengumuman/' . base64_encode(user()->id)); ?>" class="btn btn-lg btn-primary rounded-pill fs-2 px-5">BUKA</a>
        <a href="<?= base_url('/logout'); ?>" class="fs-3 text-decoration-none mt-5">Keluar</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <script>
        // Set the date we're counting down to
        // var countDownDate = new Date("May 30, 2023 19:16:00").getTime();
        var countDownDate = new Date("<?= $tanggal; ?>").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            console.log(countDownDate);
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            //     minutes + "m " + seconds + "s ";
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.querySelector(".container1").style.display = "none";
                document.querySelector(".container2").style.display = "flex";
                // document.querySelector(".hasil").style.display = "block";
            }
        }, 1000);
    </script>
</body>

</html>