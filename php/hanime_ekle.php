<?php

require 'baglan.php';

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Bilinmiyor';
    $platform = 'Bilinmiyor';
    $version = "";

    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }


    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

    if (!preg_match_all($pattern, $u_agent, $matches)) {

    }


    $i = count($matches['browser']);
    if ($i != 1) {

        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}


if (isset($_POST['ha'])) {
    $fc = getBrowser();
    $ad = $_POST['ha_adi'];
    $site = $_POST['ha_site'];
    $resim = $_POST['ha_resim'];
    $aciklama = $_POST['ha_aciklama'];
    $yas = 'R+ - Ağır Çıplaklık & Seks Öğeleri';
    $link = $_POST['ha_link'];
    $kullanici = $_SESSION['isim'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $os = $fc['platform'];
    $platform = $fc['name'];
    $version = $fc['version'];
    $allow = 'false';

    if($aciklama == ""){
        $aciklama = "Bu Hentai'ye ekleyici tarafından bir açıklama eklenmemiştir.";
    }

    // Burada platform ve ip gibi bilgileri güvenlik amacıyla tutmaktayız kesinlikle hiçbir şekilde hiçbir firmaya pazarlanmayacaktır!

    $AnimeSay = $db->prepare("SELECT * FROM tarayici_hanime_card_users WHERE user_card_title_ha = ? OR user_card_text_ha = ?");
    $AnimeSay->execute(array($ad, $aciklama));
    $kontrol = $AnimeSay->fetch(PDO::FETCH_ASSOC);
    if ($kontrol > 0) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz HAnime kayıtlıdır.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
        try {
            $sorgu = $db->prepare('INSERT INTO tarayici_hanime_card_users (user_card_title_ha, user_card_muted_ha, user_card_text_ha, user_card_image_ha, user_card_link_ha, user_card_name_ha, user_card_username_ha, user_ip, user_system, user_browser, user_browser_version, hanime_allow) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
            $ekle = $sorgu->execute([
                $ad, $yas, $aciklama, $resim, $link, $site, $kullanici, $ip, $os, $platform, $version, $allow
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if ($ekle) {
            echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  Girmiş olduğunuz HAnime <strong>Başarlıyla</strong> İnceleme listesine eklenmiştir...
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

} elseif (isset($_POST['hl'])) {
    $name = $_POST['hl_name'];
    $site = $_POST['hl_site'];
    $link = $_POST['hl_link'];
    $user = $_SESSION['isim'];

    $AnimeLinkSay = $db->prepare("SELECT * FROM tarayici_hanime_card_users WHERE user_card_link_ha = ?");
    $AnimeLinkSay->execute(array($link));
    $kontrol = $AnimeLinkSay->fetch(PDO::FETCH_ASSOC);
    if ($kontrol > 0) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz HAnime linki zaten daha önceden girilmiş.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
        $AnimeLinkSay2 = $db->prepare("SELECT * FROM tarayici_user_link WHERE user_link_link = ?");
        $AnimeLinkSay2->execute(array($link));
        $kontrol2 = $AnimeLinkSay2->fetch(PDO::FETCH_ASSOC);
        if ($kontrol2 > 0) {
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz HAnime linki zaten daha önceden girilmiş.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            $AnimeLinkSaySon = $db->prepare("SELECT * FROM tarayici_user_link WHERE user_link_anime = ?");
            $AnimeLinkSaySon->execute(array($name));
            $kontrol3 = $AnimeLinkSaySon->fetch(PDO::FETCH_ASSOC);
            if ($kontrol3 == 4) {
                echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Bir HAnimeye 4ten fazla link eklenemez.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                $AnimeNameKontrol = $db->prepare("SELECT * FROM tarayici_hanime_card_users WHERE user_card_title_ha =?");
                $AnimeNameKontrol->execute(array($name));
                $kontrol4 = $AnimeNameKontrol->fetch(PDO::FETCH_ASSOC);
                if ($kontrol4 == 0) {
                    echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz HAnime bulunamadı!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
                } else {
                    try {
                        $sorgu = $db->prepare('INSERT INTO tarayici_user_link (user_link_name, user_link_link, user_link_anime ,user_link_username) VALUES (?,?,?,?)');
                        $ekle = $sorgu->execute([
                            $site, $link, $name, $user
                        ]);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    if ($ekle) {
                        echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  Girmiş olduğunuz HAnime linki <strong>Başarlıyla</strong> Eklenmiştir...
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