<?php
require 'baglan.php';

if(isset($_POST['a'])){
    $ad = $_POST['a_adi'];
    $site = $_POST['a_site'];
    $resim = $_POST['a_resim'];
    $aciklama = $_POST['a_aciklama'];
    $yas = $_POST['a_yas'];
    $link = $_POST['a_link'];
    $kullanici = $_SESSION['isim'];

    $AnimeSay = $db->prepare("SELECT * FROM tarayici_card_anime_users WHERE user_card_title = ? OR user_card_text = ?");
    $AnimeSay->execute(array($ad, $aciklama));
    $kontrol = $AnimeSay->fetch(PDO::FETCH_ASSOC);
    if($kontrol > 0)
    {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz Anime kayıtlıdır.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else{
        try {
            $sorgu = $db ->prepare('INSERT INTO tarayici_card_anime_users (user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username) VALUES (?,?,?,?,?,?,?)');
            $ekle = $sorgu ->execute([
               $ad, $yas, $aciklama, $resim, $link, $site, $kullanici
            ]);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        if ($ekle) {
            echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  Girmiş olduğunuz anime <strong>Başarlıyla</strong> Eklenmiştir...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            echo '
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                  <strong>Hata!</strong> Beklenmedik bir hata meydana geldi lütfen daha sonra tekrar deneyin.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }

}

elseif(isset($_POST['l'])){
    $name = $_POST['l_name'];
    $site = $_POST['l_site'];
    $link = $_POST['l_link'];
    $user = $_SESSION['isim'];

    $AnimeLinkSay = $db->prepare("SELECT * FROM tarayici_card_anime_users WHERE user_card_link = ?");
    $AnimeLinkSay->execute(array($link));
    $kontrol = $AnimeLinkSay->fetch(PDO::FETCH_ASSOC);
    if($kontrol > 0)
    {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz Anime linki zaten daha önceden girilmiş.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else{
        $AnimeLinkSay2 = $db->prepare("SELECT * FROM tarayici_user_link WHERE user_link_link = ?");
        $AnimeLinkSay2->execute(array($link));
        $kontrol2 = $AnimeLinkSay2->fetch(PDO::FETCH_ASSOC);
        if($kontrol2 > 0){
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz Anime linki zaten daha önceden girilmiş.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
            $AnimeLinkSaySon = $db->prepare("SELECT * FROM tarayici_user_link WHERE user_link_anime = ?");
            $AnimeLinkSaySon->execute(array($name));
            $kontrol3 = $AnimeLinkSaySon->fetch(PDO::FETCH_ASSOC);
            if($kontrol3 == 4){
                echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Bir Animeye 4ten fazla link eklenemez.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            }else{
                $AnimeNameKontrol = $db->prepare("SELECT * FROM tarayici_card_anime_users WHERE user_card_title =?");
                $AnimeNameKontrol->execute(array($name));
                $kontrol4 = $AnimeNameKontrol->fetch(PDO::FETCH_ASSOC);
                if($kontrol4 == 0){
                    echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz anime bulunamadı!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
                }else{
                    try {
                        $sorgu = $db ->prepare('INSERT INTO tarayici_user_link (user_link_name, user_link_link, user_link_anime ,user_link_username) VALUES (?,?,?,?)');
                        $ekle = $sorgu ->execute([
                            $site, $link, $name, $user
                        ]);
                    }catch (Exception $e){
                        echo $e->getMessage();
                    }
                    if ($ekle) {
                        echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  Girmiş olduğunuz anime linki <strong>Başarlıyla</strong> Eklenmiştir...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
                    } else {
                        echo '
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                  <strong>Hata!</strong> Beklenmedik bir hata meydana geldi lütfen daha sonra tekrar deneyin.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
                    }
                }

            }


        }

    }

}