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
    </style>

</head>
<body style="background-color: #333333">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="margin-top: -40px">
        <img src="images/loli.png" class="img-fluid mb-3" style="max-width: 250px; max-height: 250px;"><br>
        <div class="col-md-6">
            <div class="form">
                <form method="get" action="sonuc.php">
                    <i class="bi-search" style="margin-top: 5px;"></i>
                    <input type="text" class="form-control form-input" id="inputValue" value="<?php $q = @$_GET['q']; if($q == ""){$q = 'Loli Search';} echo $q; ?>" aria-label="Search" aria-describedby="basic-addon2" name="q" placeholder="Herhangi birşey aratın...">
                    <span class="sol-taraf">
                                <a href="index.php" class="text-dark"><i class="bi-house"></i> </a>
                        </span>
                </form>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab2" role="tablist" style="margin-top: 30px">

        <li class="nav-item" role="presentation">

            <button
                    class="nav-link active"
                    id="pills-home-tab2"
                    data-mdb-toggle="pill"
                    data-mdb-target="#pills-home2"
                    type="button"
                    role="tab"
                    aria-controls="pills-home"
                    aria-selected="true"
            >
                Web
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
                    class="nav-link"
                    id="pills-profile-tab2"
                    data-mdb-toggle="pill"
                    data-mdb-target="#pills-profile2"
                    type="button"
                    role="tab"
                    aria-controls="pills-profile"
                    aria-selected="false"
            >
                Görsel
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
                    class="nav-link"
                    id="pills-contact-tab2"
                    data-mdb-toggle="pill"
                    data-mdb-target="#pills-contact2"
                    type="button"
                    role="tab"
                    aria-controls="pills-contact"
                    aria-selected="false"
            >
                Bilgi
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
                    class="nav-link"
                    id="pills-contact-tab2"
                    data-mdb-toggle="pill"
                    data-mdb-target="#pills-contact3"
                    type="button"
                    role="tab"
                    aria-controls="pills-contact"
                    aria-selected="false"
            >
                Anime
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
                    class="nav-link"
                    id="pills-contact-tab2"
                    data-mdb-toggle="pill"
                    data-mdb-target="#pills-contact4"
                    type="button"
                    role="tab"
                    aria-controls="pills-contact"
                    aria-selected="false"
            >
                Akademi
            </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent2">
        <div
                class="tab-pane fade show active"
                id="pills-home2"
                role="tabpanel"
                aria-labelledby="pills-home-tab2"
        >
            <?php
            if(trim($q == "sex") OR trim($q == "porn") OR trim($q == "Porno") OR trim($q == "+18") OR trim($q == "ifşa")){
                echo '<div class="alert alert-danger">Sayın kullanıcımız +18 sitelere girmek <a href="https://barandogan.av.tr/turk-ceza-kanunu.html#Madde-134">Türk Ceza Kanunun 134-135-136</a> Maddelerini ihlal ediyor olabilir LoliSearch ilerlemeniz durumunda (+18 siteler veya kendine zarar verme başlıklı siteler) hiçbir şekilde zorumluluk kabul etmemektedir.</div>';
            }
            ?>
            <div class="card text-white mb-2" style="background-color: #3c3c3c;">
                <?php
                $card_wiki = $db->prepare("SELECT card_baslik, card_muted, card_text, card_image FROM tarayici_card_wiki ");
                $card_wiki->execute(array($q));
                $kontrol = $card_wiki->fetch(PDO::FETCH_ASSOC);
                if ($kontrol > 0) {
                    $sorgu = "SELECT * FROM tarayici_card_wiki WHERE card_baslik LIKE '%$q%' LIMIT 1;";
                    $sorgukontrol = $db->query($sorgu);
                    while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
                        echo '<div class="card-header text-center text-white">Loli Wiki</div><div class="card-header">
                        <img src="'.$cikti['card_image'].'" class="rounded-1 f-right" style="max-width: 200px; max-height: 250px;"> 
                        <h1 class="fontlu">'. $cikti['card_baslik'] .'</h1>
                        <h5 class="text-muted fontlu">'. $cikti['card_muted'] .'</h5>
                        <br>
                        <p style="max-width: 1010x;" class="mb-5">'. $cikti['card_text'] .'...</p>
                        <a href="'. $cikti['card_link'] .'"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">'. $cikti['card_kaynak'] .'</div>
                        </a>';
                        if($q == "lgbt" OR $q == "lgb" OR $q == "eşcinsel" OR $q == "eşcinsel evlilik" ){
                            echo '<a href="https://tr.wikipedia.org/wiki/Ahlaks%C4%B1zl%C4%B1k"><div class="btn-sm btn-outline-warning f-right" style="border-radius: 100px;" data-ripple-color="dark">Ayrıca bakınız: Toplumda Ahlak Yapısı</div></a>';
                        }
                        echo '</div>';

                    }
                }else{
                    echo '<div class="card-header">
                        <h1 class="text-center">Opps! bir hata meydana geldi!</h1>
                    </div>';
                }
                ?>
            </div>
        <div class="card text-white mb-2" style="background-color: #3c3c3c;">
            <?php
            $card_an = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
            $card_an->execute(array($q));
            $kontrol_an = $card_an->fetch(PDO::FETCH_ASSOC);
            if ($kontrol_an > 0) {
                $sorgu = "SELECT * FROM tarayici_card_anime_users WHERE user_card_title LIKE '%$q%' LIMIT 1;";
                $sorgukontrol = $db->query($sorgu);
                while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
                    echo '<div class="card-header text-center text-white">Loli Anime Wiki</div><div class="card-header">
                        <img src="' . $cikti['user_card_image'] . '" class="rounded-1 f-right mb-1 col-md img-fluid" style="max-width: 220px; max-height: 270px;"> 
                        <h1 class="fontlu">' . $cikti['user_card_title'] . '</h1>
                        <h5 class="text-muted fontlu">' . $cikti['user_card_muted'] . '</h5>
                        <br>
                        <p class="mx-1" style="max-width: 1010x;">' . $cikti['user_card_text'] . '...</p>
                        <a href="' . $cikti['user_card_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">' . $cikti['user_card_name'] . '</div>
                        </a>
                        
                    ';
                    $link_anime = "SELECT * FROM tarayici_user_link";
                    $link_kontrol = $db->query($link_anime);
                    while($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)){
                        if($cikti2['user_link_anime'] == $cikti['user_card_title']){
                            echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
                        }
                    }echo '</div>';
                }
            }
            ?>
        </div>
        <div class="col-md-12 text-center">
            <?php
            require 'php/anime_ekle.php';
            if(isset($_POST['s'])){
                echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Sayın kullanıcımız, Şikayet özelliği henüz kullanılmamaktadır. Anlayışınız için teşekkürler...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
        </div>
        <div class="card col-md-7 f-left" style="background-color: #3c3c3c; margin-left: -3px; max-width: 760px;">
            <div class="gcse-searchresults-only" runat="server"></div>
            <script async src="https://cse.google.com/cse.js?cx=89ecf14465e74f30b"></script>
        </div>
        <div class="card text-white f-right col-md-5" style="background-color: #3c3c3c; margin-left: 0px;">
            <?php
            $card_anime = $db->prepare("SELECT tarayici_card_anime_users.user_card_title, tarayici_card_anime_users.user_card_muted, tarayici_card_anime_users.user_card_text, tarayici_card_anime_users.user_card_image, tarayici_card_anime_users.user_card_link, tarayici_card_anime_users.user_card_name, tarayici_card_anime_users.user_card_username tarayici_user_link.user_link_anime, tarayici_user_link.user_link_name, tarayici_user_link.user_link_link FROM tarayici_card_anime_users, tarayici_user_link WHERE tarayici_card_anime_users.user_card_title = tarayici_card_anime_users.user_card_name");
            $anime_sorgu = "SELECT * FROM tarayici_card_anime_users, tarayici_user_link ORDER BY RAND() LIMIT 1";
            $anime_sorgukontrol = $db->query($anime_sorgu);
            while ($cikti = $anime_sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card-header text-center text-white"><small>Random Animeler (Oluşturan Kullanıcı: ' . $cikti['user_card_username'] . ')</small></div>
                                <div class="card-header">
                               <img src="' . $cikti['user_card_image'] . '" class="rounded-1 f-right " style="max-width: 150px;"> 
                               <h1 class="fontlu">' . $cikti['user_card_title'] . '</h1>
                               <h5 class="text-muted fontlu">' . $cikti['user_card_muted'] . '</h5>
                               <br>
                               <p>' . $cikti['user_card_text'] . '...</p>
                               <a href="' . $cikti['user_card_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">' . $cikti['user_card_name'] . '</div></a>';
                $link_anime = "SELECT * FROM tarayici_user_link";
                $link_kontrol = $db->query($link_anime);
                while($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)){
                    if($cikti2['user_link_anime'] == $cikti['user_card_title']){
                        echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
                    }
                }
            }

            ?>
        </div>
        <div class="row justify-content-center">
            <div class="btn-sm btn-outline-info mb-1 mt-1 text-center align-self-center mx-1" type="button" data-mdb-toggle="modal" data-mdb-target="#animeEkleModal" style="max-width: 260px;" data-ripple-color="dark">Sizde sitenizden link koymak istermisiniz?</div>
            <div class="btn-sm btn-outline-danger mb-1 mt-1 f-right text-center align-self-center mx-1" type="button" data-mdb-target="#animeSikayetModal" data-mdb-toggle="modal" style="max-width: 200px;" data-ripple-color="dark">Şikayetiniz mi var?</div>
        </div>
        </div>
    <div class="card text-white f-right col-md-5" style="background-color: #3c3c3c;">
        <div class="card-header text-center text-white"><small>Sponsor</small></div>
        <div class="card-header mt-4 mb-5 text-center">
            SPONSORLUK İÇİN İLETİŞİME GEÇİNİZ! İLETİŞİM ADRESSLLERİ YAZILI
        </div>
    </div>
    <div class="card text-white f-right col-md-5" style="background-color: #3c3c3c;">
        <div class="card-header text-center text-white"><small>Github & Discord</small></div>
        <div class="text-center">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://discord.com/widget?id=865254296098308096&theme=dark" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>
            <div class="btn btn-outline-info" data-ripple-color="dark"> Loli Search Github: <a href="https://github.com/YasinSenpai/Loli-Search">https://github.com/YasinSenpai/Loli-Search</a></div>
        </div>
    </div>
    </div>

    <div
            class="modal fade"
            id="animeSikayetModal"
            data-mdb-backdrop="static"
            data-mdb-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Şikayet!</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['isim'])){
                            echo '<div class="form-outline mb-3">
                                    <input name="s_email" type="email" id="form12" class="form-control" disabled />
                                    <label class="form-label" for="form12">'.$_SESSION['isim'].'</label>
                                </div>';
                        }else{
                            echo '<div class="form-outline mb-3">
                                    <input name="s_email" type="email" id="form12" class="form-control" required />
                                    <label class="form-label" for="form12">Email Addressiniz</label>
                                </div>
                                <div class="form-outline mb-3">
                                    <input name="s_isim" type="text" id="form12" class="form-control" required />
                                    <label class="form-label" for="form12">Adınız soyadınız</label>
                                </div>';
                        }
                        ?>
                        <div class="form-outline mb-3">
                            <input name="s_konu" type="text" id="form12" class="form-control" required />
                            <label class="form-label" for="form12">Şikayet Konusu</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input name="s_baslik" type="text" id="form12" class="form-control" required />
                            <label class="form-label" for="form12">Şikayet Başlık</label>
                        </div>
                        <div class="form-outline">
                            <textarea class="form-control" id="textAreaExample" rows="4" required></textarea>
                            <label class="form-label" for="textAreaExample">Şikayet Mesajınız</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-info" type="sumbit" data-ripple-color="dark" name="s">Gönder!</button>
                        <button class="btn btn-outline-danger f-right" type="reset" data-ripple-color="dark">Reset!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div
            class="modal fade"
            id="animeEkleModal"
            data-mdb-backdrop="static"
            data-mdb-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Anime ekle</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                if(isset($_SESSION['isim'])){
                    echo '<div class="card-body">
<ul class="nav nav-pills mb-3 justify-content-center" id="ex1" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <a
                                      class="nav-link active"
                                      id="ex1-tab-1"
                                      data-mdb-toggle="pill"
                                      href="#ex1-pills-6"
                                      role="tab"
                                      aria-controls="ex1-pills-1"
                                      aria-selected="true"
                                      >Anime Ekle</a
                                    >
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <a
                                      class="nav-link"
                                      id="ex1-tab-2"
                                      data-mdb-toggle="pill"
                                      href="#ex1-pills-7"
                                      role="tab"
                                      aria-controls="ex1-pills-2"
                                      aria-selected="false"
                                      >Varolan animeye link ekle</a
                                    >
                                  </li>
                                </ul>
                                
                                <div class="tab-content" id="ex1-content">
                                  <div
                                    class="tab-pane fade show active"
                                    id="ex1-pills-6"
                                    role="tabpanel"
                                    aria-labelledby="ex1-tab-1"
                                  >
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
                                
                  <div class="tab-pane fade" id="ex1-pills-7" role="tabpanel" aria-labelledby="ex1-tab-2">
                     <form method="post">
                            <div class="form-outline mb-4">
                            <input type="text" name="l_name" list="anime_name" id="form5Example1" class="form-control"required />
                            <label class="form-label" for="form5Example1">Anime Adı</label>
                          </div><datalist id="anime_name" max-value="5">';
                    $card_anime = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
                    $anime_sorgu = "SELECT * FROM tarayici_card_anime_users ";
                    $anime_sorgukontrol2 = $db->query($anime_sorgu);
                    while ($cikti = $anime_sorgukontrol2->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="'.$cikti['user_card_title'].'">'.$cikti['user_card_title'].'</option>';
                    }
                    echo '</datalist>
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
                            </div>';
                }elseif(!isset($_SESSION['isim'])){
                    echo '<div class="card-body"><div class="alert alert-danger" role="alert">
                                  ANİME EKLEMENİZ İÇİN GİRİŞ YAPMANIZ GEREKMEKTEDİR! 
                                </div><br>
                            <div class="btn btn-outline-secondary align-self-center mb-2">Lütfen Ana Sayfadan Giriş Yapıp Tekrar Deneyiniz...</div>
                            <div class="btn btn-outline-danger align-self-center" data-mdb-target="#animeSikayetModal" data-mdb-toggle="modal">Şikayetiniz mi var?</div></div>';
                }
                ?>
            </div>
        </div>
    </div>
        <div
                class="modal fade"
                id="animeEkleModal"
                data-mdb-backdrop="static"
                data-mdb-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Anime ekle</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if(isset($_SESSION['isim'])){
                        echo '<div class="card-body">
<ul class="nav nav-pills mb-3 justify-content-center" id="ex1" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <a
                                      class="nav-link active"
                                      id="ex1-tab-1"
                                      data-mdb-toggle="pill"
                                      href="#ex1-pills-6"
                                      role="tab"
                                      aria-controls="ex1-pills-1"
                                      aria-selected="true"
                                      >Anime Ekle</a
                                    >
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <a
                                      class="nav-link"
                                      id="ex1-tab-2"
                                      data-mdb-toggle="pill"
                                      href="#ex1-pills-7"
                                      role="tab"
                                      aria-controls="ex1-pills-2"
                                      aria-selected="false"
                                      >Varolan animeye link ekle</a
                                    >
                                  </li>
                                </ul>
                                
                                <div class="tab-content" id="ex1-content">
                                  <div
                                    class="tab-pane fade show active"
                                    id="ex1-pills-6"
                                    role="tabpanel"
                                    aria-labelledby="ex1-tab-1"
                                  >
                                <form method="post">
                                  <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <input type="text" name="a_adi" id="form3Example1" class="form-control" />
                                        <label class="form-label" for="form3Example1">Anime Adı</label>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-outline">
                                        <input type="text" id="form3Example2" name="a_site" class="form-control" />
                                        <label class="form-label" for="form3Example2">Animenin yüklendiği site</label>
                                      </div>
                                    </div>
                                  </div>
                                
                                  <div class="form-outline mb-4">
                                    <input type="text" id="form3Example3" name="a_resim" class="form-control" />
                                    <label class="form-label" for="form3Example3">Anime resim url</label>
                                  </div>
                                    <small class="text-muted">Max. 500 karakter</small>
                                  <div class="form-outline mb-4">
                                    <input type="text" id="form3Example4" maxlength="500" name="a_aciklama" class="form-control" />
                                    <label class="form-label" for="form3Example4">Anime Açıklama</label>
                                  </div>
                                  <div class="form-outline mb-4">
                                    <input type="text" id="form3Example4" name="a_yas" class="form-control" />
                                    <label class="form-label" for="form3Example4">Anime Yaş sınırı</label>
                                  </div>
                                  
                                  <div class="form-outline mb-4">
                                    <input type="url" id="form3Example4" name="a_link" class="form-control" />
                                    <label class="form-label" for="form3Example4">Anime linki</label>
                                  </div>
                                   <button type="submit" name="a" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                    <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">Kapat</button><br>
                                    <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>
                                </div>
                             </form>
                                
                  <div class="tab-pane fade" id="ex1-pills-7" role="tabpanel" aria-labelledby="ex1-tab-2">
                     <form method="post">
                             <select class="form-select mb-4" name="l_name" aria-label="Default animeler">
                    <option selected disabled>Anime seçin</option>';
                        $card_anime = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
                        $anime_sorgu = "SELECT * FROM tarayici_card_anime_users LIMIT 6";
                        $anime_sorgukontrol2 = $db->query($anime_sorgu);
                        while ($cikti = $anime_sorgukontrol2->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="'.$cikti['user_card_title'].'">'.$cikti['user_card_title'].'</option>';
                        }
                        echo '</select>
                          <div class="form-outline mb-4">
                            <input type="text" name="l_site" id="form5Example1" class="form-control" />
                            <label class="form-label" for="form5Example1">Sitenizin Adı</label>
                          </div>

                          <div class="form-outline mb-4">
                            <input type="text" name="l_link" id="form5Example2" class="form-control" />
                            <label class="form-label" for="form5Example2">Anime Linki</label>
                          </div>
                         <button type="submit" name="l" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                        <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">Kapat</button><br>
                        <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>         
                     </form>
                  </div>
                  </div>
                  </div>
</div>';
                    }elseif(!isset($_SESSION['isim'])){
                        echo '<div class="card-body"><div class="alert alert-danger" role="alert">
                                  ANİME EKLEMENİZ İÇİN GİRİŞ YAPMANIZ GEREKMEKTEDİR!
                                </div></div>';
                    }
                    ?>
                </div>
            </div>
        </div>

    <div
            class="tab-pane fade"
            id="pills-profile2"
            role="tabpanel"
            aria-labelledby="pills-profile-tab2"
    >
        <script async src="https://cse.google.com/cse.js?cx=89ecf14465e74f30b"></script>
        <div class="gcse-searchresults-only" id="GoogleImage"></div>
    </div>
    <div
            class="tab-pane fade"
            id="pills-contact2"
            role="tabpanel"
            aria-labelledby="pills-contact-tab2"
    >
        Bilgi kısmı
    </div>
    <div
            class="tab-pane fade"
            id="pills-contact3"
            role="tabpanel"
            aria-labelledby="pills-contact-tab2"
    >
        Film kısmı
    </div>
    <div
            class="tab-pane fade"
            id="pills-contact4"
            role="tabpanel"
            aria-labelledby="pills-contact-tab2"
    >
        Akademi kısmı
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

