<?php
require 'php/baglan.php';
require 'php/istemci.php';
session_start();

?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Search</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <?php
    if(isset($_SESSION['light'])){
        echo '<link  rel="stylesheet" type="text/css" href="css/tema-light.css">';
    }elseif(isset($_SESSION['dark'])){
        echo '<link rel="stylesheet" type="text/css" href="css/tema-dark.css" />';
    }else{
        echo '<link rel="stylesheet" type="text/css" href="css/tema-light.css" />';
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
        <?php
         require 'php/anime_ekle.php';
         require 'php/hanime_ekle.php';
        ?>
        <ul class="nav nav-tabs mb-3 justify-content-center" id="myTab0" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                        class="nav-link active"
                        id="home-tab0"
                        data-mdb-toggle="tab"
                        data-mdb-target="#home0"
                        type="button"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true"
                        style="background: transparent !important;"
                >
                    Anime İşlemleri
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                        class="nav-link"
                        id="profile-tab0"
                        data-mdb-toggle="tab"
                        data-mdb-target="#profile0"
                        type="button"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                        style="background: transparent !important;"
                >
                    HAnime İşlemleri(+18)
                </button>
            </li>
        </ul>
        <?php
        if(isset($_SESSION['isim'])){ ?>
        <div class="tab-content" id="myTabContent0">
            <div
                    class="tab-pane fade show active"
                    id="home0"
                    role="tabpanel"
                    aria-labelledby="home-tab0"
            >
                <div class="row justify-content-center mt-5">
                    <div class="col-md-5 mx-1">
                        <div class="card">
                            <div class="card-header text-center fontlu">
                                <b>Anime Oluştur</b>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="a_adi" id="form3Example1" class="form-control" required />
                                                <label class="form-label" for="form3Example1">Anime Adı</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example2" name="a_site" class="form-control" required />
                                                <label class="form-label" for="form3Example2">Animenin yüklendiği site</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="url" id="form3Example3" name="a_resim" class="form-control"required />
                                        <label class="form-label" for="form3Example3">Anime resim url</label>
                                    </div>
                                    <small class="text-muted">Max. 500 karakter</small>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4" maxlength="500" name="a_aciklama" class="form-control"required />
                                        <label class="form-label" for="form3Example4">Anime Açıklama</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4" name="a_yas" class="form-control"required />
                                        <label class="form-label" for="form3Example4">Anime Yaş sınırı</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="url" id="form3Example4" name="a_link" class="form-control"required />
                                        <label class="form-label" for="form3Example4">Anime linki</label>
                                    </div>
                                    <button type="submit" name="a" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                    <button type="reset" class="btn btn-outline-danger" data-mdb-dismiss="modal">Reset</button><br>
                                    <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 mx-1">
                        <div class="card">
                            <div class="card-header text-center fontlu">
                                <b> Oluşturulmuş bir animeye link ekle! </b>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="l_name" list="anime_name" id="form5Example1" class="form-control"required />
                                        <label class="form-label" for="form5Example1">Anime Adı</label>
                                    </div><datalist id="anime_name" max-value="5"> <?php
                                        $anime_sorgu = "SELECT * FROM tarayici_card_anime_users ";
                                        $anime_sorgukontrol2 = $db->query($anime_sorgu);
                                        while ($cikti = $anime_sorgukontrol2->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="'.$cikti['user_card_title'].'">'.$cikti['user_card_title'].'</option>';
                                        }
                                        echo '</datalist>'; ?>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="l_site" id="form5Example1" class="form-control" required/>
                                            <label class="form-label" for="form5Example1">Sitenizin Adı</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="url" name="l_link" id="form5Example2" class="form-control" required/>
                                            <label class="form-label" for="form5Example2">Anime Linki</label>
                                        </div>
                                        <button type="submit" name="l" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                        <button type="reset" class="btn btn-outline-danger" data-mdb-dismiss="modal">Reset</button><br>
                                        <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile0" role="tabpanel" aria-labelledby="profile-tab0">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-5 mx-1">
                        <div class="card">
                            <div class="card-header text-center fontlu">
                                <b>Var olan bir hentai'ye link ekle</b>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="hl_name" list="hanime_name" id="form5Example1" class="form-control"required />
                                        <label class="form-label" for="form5Example1">HAnime Adı</label>
                                    </div><datalist id="hanime_name" max-value="5"><?php
                                        $anime_sorgu2 = "SELECT * FROM tarayici_hanime_card_users";
                                        $anime_sorgukontrol4 = $db->query($anime_sorgu2);
                                        while ($cikti2 = $anime_sorgukontrol4->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="'.$cikti2['user_card_title_ha'].'">'.$cikti2['user_card_title_ha'].'</option>';
                                        }
                                        echo '</datalist>'; ?>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="hl_site" id="form5Example1" class="form-control" required/>
                                            <label class="form-label" for="form5Example1">Sitenin Adı</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="url" name="hl_link" id="form5Example2" class="form-control" required/>
                                            <label class="form-label" for="form5Example2">HAnime Linki</label>
                                        </div>
                                        <button type="submit" name="hl" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                        <button type="reset" class="btn btn-outline-danger" data-mdb-dismiss="modal">Reset</button><br>
                                        <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>
                                </form>

                            </div>
                        </div>

                        <div class="alert alert-warning">
                            <b>Dikkat!</b> Hentai oluşturma işlemi sırasına birkaç bilgilerinizi güvenlik amacı ile tutmaktayız. oluşturduğunuz Hentaileri hesabınızdan takip edebilirsiniz.
                        </div>

                    </div>
                    <div class="col-md-5 mx-1">
                        <div class="card">
                            <div class="card-header text-center fontlu">
                                <b>Hentai oluştur.</b>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="ha_adi" id="form3Example1" class="form-control" required />
                                                <label class="form-label" for="form3Example1">HAnime Adı</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example2" name="ha_site" class="form-control" required />
                                                <label class="form-label" for="form3Example2">HAnimenin yüklendiği site</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="url" id="form3Example3" name="ha_resim" class="form-control"required />
                                        <label class="form-label" for="form3Example3">HAnime resim url</label>
                                    </div>
                                    <small class="text-muted">Max. 500 karakter</small>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4" maxlength="500" name="ha_aciklama" class="form-control"required />
                                        <label class="form-label" for="form3Example4">HAnime Açıklama</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4" disabled name="ha_yas" class="form-control"required />
                                        <label class="form-label" for="form3Example4">DEFAULT: 18+</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="url" id="form3Example4" name="ha_link" class="form-control"required />
                                        <label class="form-label" for="form3Example4">HAnime linki</label>
                                    </div>
                                    <button type="submit" name="ha" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                    <button type="reset" class="btn btn-outline-danger" data-mdb-dismiss="modal">Reset</button><br>
                                    <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } else{echo '<div class="alert alert-danger">Anime ve Hentai ekleme işlemleri için lütfen giriş yapınız</div><br><a href="index.php" class="btn btn-outline-info">Ana Sayfa</a>';}?>


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