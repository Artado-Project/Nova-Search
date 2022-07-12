<?php
require 'php/baglan.php';
require 'php/istemci.php';
session_start();
$url = $_SERVER['REQUEST_URI'];
$data = $_GET['user'];

if(!isset($data)){
    header('Location: index.php?safe-return=true');
}

$ara = $db->prepare("SELECT * FROM tarayici_kayit WHERE uye_kadi = '$data'");
$ara->execute(array());
$kontrol = $ara->fetch(PDO::FETCH_ASSOC);

if($ara->rowCount() == 0){
    header('Location: index.php?user=unknow');
}
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account - <?php echo $kontrol['uye_kadi']; ?></title>
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <?php
    if(isset($_SESSION['light'])){
        echo '<link  rel="stylesheet" type="text/css" href="css/tema-light.css">';
    }elseif(isset($_SESSION['dark'])){
        echo '<link rel="stylesheet" type="text/css" href="css/tema-dark.css" />';
    }else{
        echo '<link  rel="stylesheet" type="text/css" href="css/tema-light.css">';
    }
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <style>
        .fontlu{
            font-family: 'Quicksand', sans-serif;
        }
        ::-webkit-scrollbar{
            border-radius: 100px;
        }
        ::-webkit-scrollbar-thumb{
            border: 1px solid #ffffff;
        }
        .bosluk_button{
            margin-right: 3px;
        }
    </style>
</head>
<body style="position: relative;">

<div class="container-fluid">
    <div class="container">
        <div class="mt-4"></div>
        <div class="row justify-content-center">
            <div class="card col-md-6 background text-white mx-1">
                <div class="card-body text-center">
                    <img class="img-fluid rounded-circle mb-4" width="160" src="<?php
                    echo $kontrol['uye_pp'];
                    ?>">
                    <h3 class="mb-2"><?php echo $data; ?></h3>
                    <div style="font-size: medium" class="fontlu"><b><?php echo $kontrol['uye_hakkimda']; ?></b></div>
                </div>
            </div>
            <div class="col-md-5 card overflow-auto background text-white text-center" style="max-height: 330px;">
                <div class="card-body">
                    <h3 class="fontlu">Onaylanan Paylaşımları</h3>
                    <div class="overflow-auto scrollbar"><br>
                        <?php
                        $fav_sorgu = $db->prepare("SELECT * FROM tarayici_hanime_card_users WHERE user_card_username_ha = '$data' AND hanime_allow='true' OR hanime_allow ='' ");
                        $fav_sorgu->execute(array());

                        if($fav_sorgu->rowCount() == 0){
                            echo '<div class="alert alert-warning align-self-center alert-dismissible fade show col-md-12 f-right" role="alert" style="margin-top: 60px;">
                        <strong>Dikkat!</strong> Burada gösterilebilicek birşey yok!
                    </div>';
                        }else{
                            while($fav_cikti = $fav_sorgu->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="note note-primary text-dark"> '.$fav_cikti['user_card_title_ha'].'</div><hr class="ince">';
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card col-md-6 background text-white mx-1" style="max-height: 290px;">
                <div class="card-body text-center">
                    <h3 class="fontlu">Artado Forum Paylaşımları</h3>
                    <div class="alert alert-info align-self-center alert-dismissible fade show col-md-10 f-right" role="alert" style="margin-top: 60px;">
                        <strong>Dikkat!</strong> Bu özellik henüz eklenmemiştir.
                    </div>
                </div>
            </div>
            <div class="col-md-5 card background overflow-auto text-white text-center" style="max-height: 290px;">
                <div class="card-body">
                    <h3 class="fontlu">Bekleyen İşlemler</h3>
                    <div class="overflow-auto scrollbar"><br>
                        <?php
                        $w = $db->prepare("SELECT * FROM tarayici_hanime_card_users WHERE user_card_username_ha='$data' AND hanime_allow='false'");
                        $w->execute(array());
                        if($w->rowCount() == 0){
                            echo '<div class="alert alert-warning align-self-center alert-dismissible fade show col-md-auto text-center" role="alert" style="margin-top: 60px;">
                        <strong>Dikkat!</strong> Burada gösterilebilicek birşey yok!
                    </div>';
                        }else{
                            while($w2 = $w->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="note note-info" style="color: black">'.$w2['user_card_title_ha'].'</div>';
                            }
                        }

                        ?>

                    </div>
                </div>
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

</body>
</html>