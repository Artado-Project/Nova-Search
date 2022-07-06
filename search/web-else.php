<?php
require 'Nova_Bots/+18_onlem.php'
?>
<!--Nova Wiki-->
<div class="card text-white mb-2" style="background-color: #3c3c3c;">
    <?php
    $card_wiki = $db->prepare("SELECT card_baslik, card_muted, card_text, card_image FROM tarayici_card_wiki ");
    $card_wiki->execute(array($q));
    $kontrol = $card_wiki->fetch(PDO::FETCH_ASSOC);
    if ($kontrol > 0) {
        $sorgu = "SELECT * FROM tarayici_card_wiki WHERE card_baslik LIKE '%$q%' LIMIT 1;";
        $sorgukontrol = $db->query($sorgu);
        while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
            echo '<span class="card-header text-center badge badge-success" style="font-size: smaller">Nova Wiki</span><div class="card-header">
                                <img src="'.$cikti['card_image'].'" class="rounded-1 f-right" style="max-width: 200px; max-height: 220px;"> 
                                <h1 class="fontlu">'. $cikti['card_baslik'] .'</h1>
                                <h5 class="text-muted fontlu">'. $cikti['card_muted'] .'</h5>
                                <br>
                                <p style="max-width: 1010x;" class="mb-5 text-decoration-none anti_a">'. $cikti['card_text'] .'...</p>
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
<!--Nova Anime Wiki-->
<div class="card text-white mb-2" style="background-color: #3c3c3c;">
    <?php
    if($_SESSION['tur'] == 'Anime' OR $_SESSION['tur'] == 'HAnime'){
        $card_an = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
        $card_an->execute(array($q));
        $kontrol_an = $card_an->fetch(PDO::FETCH_ASSOC);
        if ($kontrol_an > 0) {
            $sorgu = "SELECT * FROM tarayici_card_anime_users WHERE user_card_title LIKE '%$q%' LIMIT 1;";
            $sorgukontrol = $db->query($sorgu);
            while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
                echo '<span class="badge badge-primary card-header text-center"style="font-size: smaller">Nova Anime Wiki</span><div class="card-header">
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
                while ($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)) {
                    if ($cikti2['user_link_anime'] == $cikti['user_card_title']) {
                        echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
                    }
                }
                echo '</div>';
            }
        }

    }if($_SESSION['tur'] == 'HAnime'){

        $card_an = $db->prepare("SELECT user_card_title_ha, user_card_muted_ha, user_card_text_ha, user_card_image_ha, user_card_link_ha, user_card_name_ha, user_card_username_ha FROM tarayici_hanime_card_users ");
        $card_an->execute(array($q));
        $kontrol_an = $card_an->fetch(PDO::FETCH_ASSOC);
        if ($kontrol_an > 0) {
            $sorgu = "SELECT * FROM tarayici_hanime_card_users WHERE user_card_title_ha LIKE '%$q%' LIMIT 1;";
            $sorgukontrol = $db->query($sorgu);
            while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
                if ($cikti['hanime_allow'] == 'false') {
                    break;
                } else {
                    echo '<span class="badge badge-danger card-header text-center"style="font-size: smaller">Nova HAnime Wiki</span><div class="card-header">
                                <img src="' . $cikti['user_card_image_ha'] . '" class="rounded-1 f-right mb-1 col-md img-fluid" style="max-width: 220px; max-height: 270px;"> 
                                <h1 class="fontlu">' . $cikti['user_card_title_ha'] . '</h1>
                                <h5 class="text-muted fontlu">' . $cikti['user_card_muted_ha'] . '</h5>
                                <br>
                                <p class="mx-1" style="max-width: 1010x;">' . $cikti['user_card_text_ha'] . '...</p>
                                <a href="' . $cikti['user_card_link_ha'] . '"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">' . $cikti['user_card_name_ha'] . '</div>
                                </a>
                                
                            ';
                    $link_anime = "SELECT * FROM tarayici_user_link";
                    $link_kontrol = $db->query($link_anime);
                    while ($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)) {
                        if ($cikti2['user_link_anime'] == $cikti['user_card_title_ha']) {
                            echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
                        }
                    }
                    echo '</div>';
                }
            }
        }

    }
    ?>
</div>
<!--Nova Sözlük-->
<div class="card text-white mb-2 col-md-12"  style="background: #3c3c3c">
    <?php
    $card_sozluk = $db->prepare("SELECT * FROM tarayici_sozluk");
    $card_sozluk->execute(array($q));
    $card_sozluk_ck = $card_sozluk->fetch(PDO::FETCH_ASSOC);
    if($card_sozluk_ck > 0){
        $sozluk_sorgu = "SELECT * FROM tarayici_sozluk WHERE sozluk_baslik LIKE '%$q%' LIMIT 1";
        $sozluk_kontrol = $db->query($sozluk_sorgu);
        while($cikti = $sozluk_kontrol->fetch(PDO::FETCH_ASSOC)){
            echo '<span class="badge card-header badge-info"style="font-size: smaller">Nova Sözlük</span><div class="card-header text-center fontlu"><h3>'.$cikti['sozluk_baslik'].'</h3></div>
                                  <div class="card-body fontlu">'.$cikti['sozluk_aciklama'].'</div>';

        }
    }
    ?>
</div>
<div class="col-md-12 text-center">
    <!--anime_ekle.php zorunlu kılınması-->
    <?php
    require 'Nova_Bots/anime_ekle.php';
    if(isset($_POST['s'])){
        echo '
                        <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                          <strong>Dikkat!</strong> Sayın kullanıcımız, Şikayet özelliği henüz kullanılmamaktadır. Anlayışınız için teşekkürler...
                          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>';
    }
    ?>
</div>
<!--Web Sonuç-->
<div class="card col-md-7 f-left" style="background-color: #3c3c3c; margin-left: -3px; max-width: 760px;">
    <?php
    if(!isset($_GET['gorsel'])){
        echo '<script async src="https://cse.google.com/cse.js?cx=f14e0d02fc65ebd77"></script>
                        <div class="gcse-searchresults-only"></div>';
    }
    ?>
</div>
<!--Nova Random Anime-->
<div class="card text-white f-right col-md-5" style="background-color: #3c3c3c; margin-left: 0px;">
    <?php
    if($_SESSION['tur'] == 'Anime'){
        $card_anime = $db->prepare("SELECT tarayici_card_anime_users.user_card_title, tarayici_card_anime_users.user_card_muted, tarayici_card_anime_users.user_card_text, tarayici_card_anime_users.user_card_image, tarayici_card_anime_users.user_card_link, tarayici_card_anime_users.user_card_name, tarayici_card_anime_users.user_card_username tarayici_user_link.user_link_anime, tarayici_user_link.user_link_name, tarayici_user_link.user_link_link FROM tarayici_card_anime_users, tarayici_user_link WHERE tarayici_card_anime_users.user_card_title = tarayici_card_anime_users.user_card_name");
        $anime_sorgu = "SELECT * FROM tarayici_card_anime_users, tarayici_user_link ORDER BY RAND() LIMIT 1";
        $anime_sorgukontrol = $db->query($anime_sorgu);
        while ($cikti = $anime_sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
            echo '<span class="badge badge-warning card-header text-center"style="font-size: smaller">Random Animeler (Oluşturan Kullanıcı: <a style="color: #0c56d0!important;" href="visitor_account.php?user='. $cikti['user_card_username'] .'"> ' . $cikti['user_card_username'] . '</a>)</span>
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
            echo '</div><div class="row justify-content-center">
    <a class="btn-sm btn-outline-info mb-1 mt-1 text-center align-self-center mx-1" type="button" href="anime_hanime_ekle.php" style="max-width: 260px;" data-ripple-color="dark">Sizde sitenizden link koymak istermisiniz?</a>
</div>';
        }
    }if($_SESSION['tur'] == 'HAnime'){
        $card_anime = $db->prepare("SELECT tarayici_hanime_card_users.user_card_title_ha, tarayici_hanime_card_users.user_card_muted_ha, tarayici_hanime_card_users.user_card_text_ha, tarayici_hanime_card_users.user_card_image_ha, tarayici_hanime_card_users.user_card_link_ha, tarayici_hanime_card_users.user_card_name_ha, tarayici_hanime_card_users.user_card_username_ha, tarayici_user_link.user_link_anime, tarayici_user_link.user_link_name, tarayici_user_link.user_link_link FROM tarayici_hanime_card_users, tarayici_user_link WHERE tarayici_hanime_card_users.user_card_title_ha = tarayici_hanime_card_users.user_card_name_ha");
        $anime_sorgu = "SELECT * FROM tarayici_hanime_card_users, tarayici_user_link ORDER BY RAND() LIMIT 1";
        $anime_sorgukontrol = $db->query($anime_sorgu);
        while ($cikti = $anime_sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
            if($cikti['hanime_allow'] == 'false'){
                break;
            }else{
                echo '
<span class="badge badge-danger card-header text-center"style="font-size: smaller">Random HAnimeler (Oluşturan Kullanıcı: <a style="color: #0c56d0!important;" href="visitor_account.php?user='. $cikti['user_card_username_ha'] .'"> ' . $cikti['user_card_username_ha'] . '</a>)</span>
                                        <div class="card-header">
                                       <img src="' . $cikti['user_card_image_ha'] . '" class="rounded-1 f-right " style="max-width: 150px;"> 
                                       <h1 class="fontlu">' . $cikti['user_card_title_ha'] . '</h1>
                                       <h5 class="text-muted fontlu">' . $cikti['user_card_muted_ha'] . '</h5>
                                       <br>
                                       <p>' . $cikti['user_card_text_ha'] . '...</p>
                                       <a href="' . $cikti['user_card_link_ha'] . '"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">' . $cikti['user_card_name_ha'] . '</div></a>';
                $link_anime = "SELECT * FROM tarayici_user_link";
                $link_kontrol = $db->query($link_anime);
                while($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)){
                    if($cikti2['user_link_anime'] == $cikti['user_card_title_ha']){
                        echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
                    }
                }echo '</div>
    <a class="btn-sm btn-outline-info mb-1 mt-1 text-center align-self-center mx-1" type="button" href="anime_hanime_ekle.php" style="max-width: 260px;" data-ripple-color="dark">Sizde sitenizden link koymak istermisiniz?</a>';

            }
        }
    }elseif($_SESSION['tur'] == 'Normal'){
        echo '<span class="badge badge-secondary card-header text-center">Hava Durumu</span>
        <div class="card-header">'; ?> <a class="weatherwidget-io" style="border-radius: 3px;" href="https://forecast7.com/tr/41d0128d98/istanbul/" data-label_1="İSTANBUL" data-label_2="Hava Durumu" data-theme="original" >İSTANBUL Hava Durumu</a>
    <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script> <?php echo '</div>';
    }

    ?>
</div>
<div class="card text-white f-right col-md-5" style="background-color: #3c3c3c;">
    <span class="badge badge-secondary card-header text-center" style="font-size: smaller">Son Eklenen Bilgi Kutusu</span>
    <div class="card-header">
        <?php
        $card_new = $db->prepare("SELECT * FROM tarayici_card_wiki ORDER BY id DESC LIMIT 0,1");
        $card_new->execute(array());
        while ($veri_cek = $card_new->fetch(PDO::FETCH_ASSOC)){
            echo ' <img src="'.$veri_cek['card_image'].'" class="rounded-1 f-right" style="max-width: 200px; max-height: 220px;"> 
                                <h1 class="fontlu">'. $veri_cek['card_baslik'] .'</h1>
                                <h5 class="text-muted fontlu">'. $veri_cek['card_muted'] .'</h5>
                                <br>
                                <p class="mb-5 text-decoration-none anti_a">'. $veri_cek['card_text'] .'...</p>
                                <a href="'. $veri_cek['card_link'] .'"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">'. $veri_cek['card_kaynak'] .'</div>
                                </a>';
        }

        ?>
    </div>
</div>
</div>
