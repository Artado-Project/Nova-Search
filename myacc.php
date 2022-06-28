<?php
session_start();
    require 'php/baglan.php';
    require 'php/istemci.php';

    if(!isset($_SESSION['isim'])){
        header('Location: index.php');
    }
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account - <?php echo $_SESSION['isim'] ?></title>
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
        <?php
        $isim = $_SESSION['isim'];
        ?>
        <div class="row justify-content-center">

            <?php
            require 'php/account_system.php';
            ?>

            <div class="card col-md-6 background text-white mx-1">
                <div class="card-body text-center">
                    <img class="img-fluid rounded-circle mb-4" width="160" src="<?php
                    $pp_sorgu = "SELECT uye_pp FROM tarayici_kayit WHERE uye_kadi = '$isim' ";
                    $pp_kontrol = $db->query($pp_sorgu);
                    $pp_cikti = $pp_kontrol->fetch(PDO::FETCH_ASSOC);
                    echo $pp_cikti['uye_pp'];
                    ?>">
                    <h3 class="mb-4"><?php echo $_SESSION['isim']; ?></h3>
                    <div class="justify-content-center">
                        <div class="btn-group shadow-0" role="group">
                            <div class="btn-sm mx-2 mb-1 btn-outline-secondary" type="button" data-mdb-target="#hesapModal" data-mdb-toggle="modal">Kullanıc adı değiştir</div>
                            <div class="btn-sm mx-2 mb-1 btn-outline-warning" type="button" data-mdb-target="#sifreModal" data-mdb-toggle="modal">Şifreni değiştir</div>
                            <div class="btn-sm mx-2 btn-outline-danger" type="button" data-mdb-target="#hesapsilModal" data-mdb-toggle="modal">Hesabı sil</div>
                            <div class="btn-sm mx-2 btn-outline-success" type="button" data-mdb-target="#ppModal" data-mdb-toggle="modal">Profil Fotoğrafı</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 card overflow-auto background text-white text-center" style="max-height: 330px;">
                <div class="card-body">
                    <h3 class="fontlu">Onaylanan Paylaşımlarım</h3>
                    <div class="overflow-auto scrollbar"><br>
                        <?php
                        $fav_sorgu = $db->prepare("SELECT * FROM tarayici_hanime_card_users WHERE user_card_username_ha = '$isim' AND hanime_allow='true' OR hanime_allow ='' ");
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
                    <h3 class="fontlu">Artado Forum Paylaşımlarım</h3>
                    <div class="alert alert-info align-self-center alert-dismissible fade show col-md-10 f-right" role="alert" style="margin-top: 60px;">
                        <strong>Dikkat!</strong> Bu özellik henüz eklenmemiştir.
                    </div>
                </div>
            </div>
            <div class="col-md-5 card background overflow-auto text-white text-center" style="max-height: 290px;">
                <div class="card-body">
                    <h3 class="fontlu">Bekleyen İşlemlerim</h3>
                    <div class="overflow-auto scrollbar"><br>
                        <?php
                        $w = $db->prepare("SELECT * FROM tarayici_hanime_card_users WHERE user_card_username_ha='$isim' AND hanime_allow='false'");
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

<div
    class="modal fade"
    id="hesapModal"
    data-mdb-backdrop="static"
    data-mdb-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Hesap İşlemleri</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="input-group mb-4">
                        <input class="form-control form-icon-trailing"required  name="new_username" type="text" placeholder="Lütfen Yeni kullanıcı adınızı girin" aria-label="Lütfen profil foto. linkini yapıştırın" aria-describedby="icon" />
                        <span class="input-group-text text-center" id="icon"><i class="bi-person"></i></span>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="n_u">Kaydet</button>
                        <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div
    class="modal fade"
    id="ppModal"
    data-mdb-backdrop="static"
    data-mdb-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Hesap İşlemleri</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="input-group mb-4">
                        <input class="form-control form-icon-trailing" required name="uye_pp" type="url" placeholder="Lütfen profil foto. linkini yapıştırın" aria-label="Lütfen profil foto. linkini yapıştırın" aria-describedby="icon" />
                        <span class="input-group-text text-center" id="icon"><i class="bi-camera"></i></span>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="pp">Kaydet</button>
                        <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div
    class="modal fade"
    id="sifreModal"
    data-mdb-backdrop="static"
    data-mdb-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Hesap İşlemleri</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="input-group mb-4">
                        <input class="form-control form-icon-trailing" required name="newpass_pass" type="text" placeholder="Lütfen Yeni Şifrenizi Girin" aria-label="Lütfen profil foto. linkini yapıştırın" aria-describedby="icon" />
                        <span class="input-group-text text-center" id="icon"><i class="bi-key"></i></span>
                    </div>
                    <div class="input-group mb-4">
                        <input class="form-control form-icon-trailing" required name="newpass_pass_again" type="text" placeholder="Lütfen Yeni Şifrenizi Tekrardan Girin" aria-label="Lütfen profil foto. linkini yapıştırın" aria-describedby="icon" />
                        <span class="input-group-text text-center" id="icon"><i class="bi-lock"></i></span>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="newpass">Kaydet</button>
                        <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div
    class="modal fade"
    id="hesapsilModal"
    data-mdb-backdrop="static"
    data-mdb-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Hesap İşlemleri</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="text-center">
                        <h3>DİKKAT!</h3>
                        <h6>Bu işlemin geri dönüşü yoktur</h6>
                        <div class="mb-4"></div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-outline-danger" type="submit" data-mdb-ripple-color="dark" name="hesapsil"><i class="bi bi-exclamation-circle"></i> Hesabımı Sil <i class="bi bi-exclamation-circle"></i></button>
                        <button class="btn btn-outline-success" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                    </div>
                </form>
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