<?php
session_start();
require 'php/baglan.php';
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Search</title>
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
<body style="background-repeat: no-repeat; background-attachment: fixed; background-size: cover; <?php if(isset($_SESSION['bg'])){echo 'background: url('.$_SESSION['bg'].') no-repeat fixed; background-size: cover;';}else{echo 'background-color: #333333';}?>">
    <!--Nova Search, Artado Project bünyesinde M. Yasin Özkaya tarafından tasarlanıp kodlanmıştır-->
    <div style="margin-top: 10px"></div>
    <div class="container">
        <?php
            if(isset($_SESSION['isim'])){
                $isim = $_SESSION['isim'];
                $sorgu = $db->query("SELECT * FROM tarayici_kayit WHERE uye_kadi = '$isim'");
                $c = $sorgu->fetch(PDO::FETCH_ASSOC);
                echo '<div class="dropdown"><img src="'.$c['uye_pp'].'" class="img-fluid" id="dropdownMenuButton" data-mdb-toggle="dropdown" width="50" style="border-radius: 3px; cursor: pointer;">
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item bg-light" href="#" style="color: black !important;">'.$_SESSION['isim'].'</a></li>
                        <li><hr class="dropdown-divider" style="color: black !important;" /></li>
                        <li><a class="dropdown-item" href="myacc.php" style="color: black !important;">Hesabım</a></li>
                        <li><a class="dropdown-item" style="color: black !important;" href="mailto:ozkayayasin964@gmail.com">İletişim</a></li>
                        <li><a class="dropdown-item" style="color: black !important;" href="php/logout.php">Çıkış</a></li>
                      </ul>';
            }
            elseif(!isset($_SESSION['isim'])){
                echo '<div class="btn btn-outline-info" data-ripple-color="dark" data-bs-toggle="modal" data-bs-target="#modalKayit">Kayıt - Giriş</div>';
            }
        ?>

        <button class="btn btn-outline-success f-right mx-1 h-25" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" data-ripple-color="dark" aria-controls="offcanvasRight"><i class="bi-list"></i></button>
        <a href="https://www.artadosearch.com/Donate"><div class="btn btn-outline-warning f-right" data-ripple-color="dark">Bağış Yap</div></a>
        <?php
            require 'php/istemci.php';
            require 'php/tema.php';
            require 'Nova_Bots/background.php';
        ?>
        <div class="offcanvas offcanvas-end" style="max-width: 300px" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <style>
                ::-webkit-scrollbar {
                    width: 4px;
                    color: #3c3c3c;
                }
            </style>
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Kontrol Panel</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
               <br>
                <form method="post">
                    <select class="form-select mb-3" aria-label="Default temalar" name="tema">

                        <option selected disabled>Temalar</option>
                        <option value="dark">Default: Gece</option>
                        <option value="light">Aydınlık</option>
                    </select>
                    <select class="form-select mb-3" aria-label="Disabled diller" disabled>
                        <option selected disabled>Diller</option>
                        <option value="1">İngilizce</option>
                        <option value="2">Türkçe</option>
                        <option value="3">Japonca</option>
                    </select>
                    <select class="form-select mb-3" aria-label="tür" name="tur">
                        <option selected disabled><?= @$_SESSION['tur'] ?></option>
                        <option  value="Normal">Normal</option>
                        <option value="Anime">Anime</option>
                        <option value="HAnime">HAnime</option>
                    </select>
                    <input class="form-control mb-3" placeholder="Arkaplan Url Girin" type="url" name="bg_link">
                    <button class="btn btn-outline-info" name="s" type="submit">Kaydet!</button>
                </form>
                <hr class="ince">
                <a class="btn btn-outline-dark mb-3" data-ripple-color="dark" href="https://github.com/YasinSenpai/Nova-Search/">Github</a><br>
                <a class="btn btn-outline-secondary mb-3" data-ripple-color="dark" href="Nova-Search.php">Hakkımızda</a><br>
                <a class="btn btn-outline-primary mb-3" data-ripple-color="dark" href="Nova-Search.php">Manifesto'muz</a>
                <a class="btn btn-outline-success mb-3" data-ripple-color="dark" href="Nova-Search.php">Güncelleme notları</a><br>
                <hr class="ince">
                <div class="col-md-12">
                    <h3 class="text-center fontlu">Nova Search</h3>
                    <p class="text-center mb-3">Nova Search'te aramalarınız kaydedilmez. Kimse sizin kim olduğunuzu bilemez. Nova Search ile tamamen anonim olarak internetin sınırlarını keşfedebilirsiniz!</p>
                </div>
            </div>
        </div>
        <!--Arama input + icon-->
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="margin-top: 30px">
            <div class="col-md-6">
                <div class="text-center">
                    <img src="images/artado_but_anime.png" style="width: 300px;" class="img-fluid mb-3 ">
                </div>
                <div class="form">
                    <form method="get" action="sonuc.php">
                        <i class="bi-search"></i>
                        <input type="text" class="form-control form-input" aria-label="Search" aria-describedby="basic-addon2" autofocus name="q" id="q" value="" target="_blank" placeholder="Herhangi birşey aratın..." required>
                        <span class="sol-taraf">
                            <a href="#" class="text-black" data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right" data-mdb-trigger="focus" data-mdb-content="Sayın kullanıcımız bu özellik şuanda kullanılmamaktadır"><i class="bi-mic"></i></a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <script>

        </script>
        <div class="row mt-5 text-center">
            <script>
                $(document).ready(function(){
                    $("#card1").css("center-block")
                });

            </script>
            <!--Tarih - Saat card-->
            <div class="col-md-2" style="margin-left: -20px;"></div>
            <div class="col-sm-4 mb-2" id="card1">
                <div class="card index-card" style="background-color: #3c3c3c; color: #FFFFFF; border: 1px solid #FFFFFF">
                    <div class="card-body">
                        <h1 class="card-text fontlu" style="text-transform: uppercase;" id="time"></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-2">
                <div class="card index-card" style="background-color: #3c3c3c; color: #FFFFFF; border: 1px solid #FFFFFF   ">
                    <div class="card-body">
                        <h1 class="card-text fontlu"><?php echo date('d/m/Y'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php if(@$_SESSION['tur'] == 'HAnime'){ ?>
            <div class="alert alert-danger text-center">Sayın kullanıcımız, Hanime +18 bir özelliktir devam etmeniz durumunda Nova Search hiçbir sorumluluk kabul etmemektedir!</div>
        <?php } ?>
    </div>

        <div class="modal fade" id="modalKayit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close f-right" data-bs-dismiss="modal" aria-label="Close"></button><br>
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a
                                        class="nav-link active"
                                        id="tab-login"
                                        data-mdb-toggle="pill"
                                        href="#pills-login"
                                        role="tab"
                                        aria-controls="pills-login"
                                        aria-selected="true"
                                        style="color: #3c3c3c !important;"
                                >Giriş Yap</a
                                >
                            </li>
                            <li class="nav-item" role="presentation">
                                <a
                                        class="nav-link"
                                        id="tab-register"
                                        data-mdb-toggle="pill"
                                        href="#pills-register"
                                        role="tab"
                                        aria-controls="pills-register"
                                        aria-selected="false"
                                        style="color: #3c3c3c !important;"
                                >Kayıt Ol</a
                                >
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                <form method="post">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="g-kadi" id="loginName" class="form-control" required />
                                        <label class="form-label" for="loginName">Kullanıcı Adınız</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="g-pass" id="loginPassword" class="form-control" required />
                                        <label class="form-label" for="loginPassword">Şifreniz</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-4" name="g">Giriş yap</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                                <div class="alert alert-info">Sayın kullanıcımız. Artado Search ile Nova Search'in Account özelliği birleşmektedir ve şuanda üzerinde çalışılmaktadır. lütfen daha sonra tekrar deneyin.</div>
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