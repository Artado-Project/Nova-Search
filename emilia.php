<?php // EMİLİA ŞUAN HAZIR DEĞİL !
require 'Emilia/emilia_sys.php';
require 'Emilia/commands.php';
require 'php/baglan.php';
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Emilia</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <meta name="keywords" content="arama, arama motoru, yerli, artado, gizlilik, milli, türk yapımı, güvenli, açık kaynak, reklamsız, reklamsız arama motoru, search, search engine, privacy, security, tarayıcı, browser, celer, anime, animeli arama motoru, animeci, yerli anime, hentaili arama motoru">
    <meta name="description" content="Open source, Anime, Private and Anonymous Search engine ">
    <?php
        if(isset($_SESSION['light'])){
            echo '<link  rel="stylesheet" type="text/css" href="css/tema-light.css">';
        }elseif(isset($_SESSION['dark'])){
            echo '<link rel="stylesheet" type="text/css" href="css/tema-dark.css" />';
        }else{
            echo '<link rel="stylesheet" type="text/css" href="css/tema-light.css" />';
        }

        if(!isset($_SESSION['tur']) OR $_SESSION['tur'] == "" OR $_SESSION['tur'] == null){
            $_SESSION['tur'] = true;
            $_SESSION['tur'] = 'Anime';
        }

    ?>
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <style>
        .fontlu{
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="mb-3"></div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/mdb.min.js"></script>
    <script>
        function realtime() {
            let time = moment().format('h:mm:ss a');
            document.getElementById('time').innerHTML = time;

            setInterval(() => {
                time = moment().format('h:mm:ss a');
                document.getElementById('time').innerHTML = time;
            }, 1000)

        }
        realtime();
    </script>
</body>
</html>