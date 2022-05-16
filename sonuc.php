<?php
require 'php/istemci.php';
session_start();
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo @$_GET['q'];?> - Loli Search</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <style>
        .fontlu{
            font-family: 'Quicksand', sans-serif;
        }
        a{
            color: #3c3c3c;
            transition: 0.5s;

        }
        .anti_a{
            pointer-events: none;
        }
        a:hover{
            color: gray;
        }
    </style>

</head>
<?php
@$isim = $_SESSION['isim'];
$bgsorgu = $db->prepare("SELECT * FROM tarayici_kayit WHERE uye_kadi = '$isim'");
$bgsorgu->execute(array());
$c = $bgsorgu->fetch(PDO::FETCH_ASSOC);
?>
<body style="background-repeat: no-repeat; background-attachment: fixed; <?php if(isset($c['uye_bg'])){echo 'background: url('.$c['uye_bg'].')';}elseif(!isset($c['uye_bg'])){echo 'background-color: #333333';}?>">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center mt-1">
        <div class="col-md-6 position-fixed" style="z-index: 1;">
            <div class="form">
                <form method="get" action="sonuc.php">
                    <i class="bi-search" style="margin-top: 5px;"></i>
                    <input type="text" class="form-control form-input" value="<?php require 'search/inpput.php'; echo $q;?>" aria-label="Search" aria-describedby="basic-addon2" name="q" placeholder="Herhangi birşey aratın..." required>
                    <span class="sol-taraf">
                        <a href="index.php">
                            <img src="images/IMG_074.png" class="img-fluid" style="max-width: 30px; margin-left: 10px;">
                        </a>
                    </span>
                </form>
            </div>
        </div>
    </div>
    <style>
        .hover:hover{
            background-color: white;
            transition: 0.5s;
            color: #3c3c3c;
        }
    </style>
    <div class="row text-center mt-5">
        <?php require 'search/url.php'; ?>
        <form method="post">
            <button type="submit" name="web" value="&type=web" class="btn btn-rounded btn-outline-white hover">Web</button>
            <button type="submit" name="gorsel"  class="btn btn-rounded btn-outline-white hover">Görsel</button>
            <button type="submit" name="bilgi" class="btn btn-rounded btn-outline-white hover">Bilgi</button>
            <button type="submit" name="akademi" class="btn btn-rounded btn-outline-white hover">Akademik</button>
            <button type="submit" name="anime" class="btn btn-rounded btn-outline-white hover">Anime</button>
        </form>
    </div>
    <?php
        $url = $_SERVER['REQUEST_URI'];

        if($url == '/Loli-Search/sonuc.php?q='.$q.'&type_web'){
            require 'search/web-else.php';
        }
        if($url == '/Loli-Search/sonuc.php?q='.$q.'&type_gorsel'){
            require 'search/gorsel.php';
        }
        if($url == '/Loli-Search/sonuc.php?q='.$q.'&type_bilgi'){
            require 'search/bilgi.php';
        }
        if($url == '/Loli-Search/sonuc.php?q='.$q.'&type_anime'){
            require 'search/anime.php';
        }
        if($url == '/Loli-Search/sonuc.php?q='.$q.''){
		    require 'search/web-else.php';
	    }

    ?>



</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/mdb.min.js"></script>
</body>

