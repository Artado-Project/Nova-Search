<?php
require 'Nova_Bots/+18_onlem.php';
?>

<!--Nova HAnime Wiki-->
<div class="card text-white mb-2" style="background-color: #3c3c3c;">
    <?php
    $card_an = $db->prepare("SELECT user_card_title_ha, user_card_muted_ha, user_card_text_ha, user_card_image_ha, user_card_link_ha, user_card_name_ha, user_card_username_ha FROM tarayici_hanime_card_users ");
    $card_an->execute(array($q));
    $kontrol_an = $card_an->fetch(PDO::FETCH_ASSOC);
    if ($kontrol_an > 0) {
        $sorgu = "SELECT * FROM tarayici_hanime_card_users WHERE user_card_title_ha LIKE '%$q%' LIMIT 1;";
        $sorgukontrol = $db->query($sorgu);
        while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
            if($cikti['hanime_allow'] == 'false'){
                break;
            }else{
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
                while($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)){
                    if($cikti2['user_link_anime'] == $cikti['user_card_title_ha']){
                        echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
                    }
                }echo '</div>';
            }
            }
    }
    ?>
</div>
<!--Web Sonuç-->
<div class="card col-md-7 f-left " style="background-color: #3c3c3c; margin-left: -3px; max-width: 760px; min-height: 500px;">
    <?php
    if(!isset($_GET['gorsel'])){
        echo '<script async src="https://cse.google.com/cse.js?cx=7fa903cdb7097786d"></script>
    <div class="gcse-searchresults-only"></div>';
    }
    ?>
    <!--Nova Random HAnime-->
    <?php

    for($b = 2; $b != 0; $b--){
        $card_anime = $db->prepare("SELECT tarayici_hanime_card_users.user_card_title_ha, tarayici_hanime_card_users.user_card_muted_ha, tarayici_hanime_card_users.user_card_text_ha, tarayici_hanime_card_users.user_card_image_ha, tarayici_hanime_card_users.user_card_link_ha, tarayici_hanime_card_users.user_card_name_ha, tarayici_hanime_card_users.user_card_username_ha, tarayici_user_link.user_link_anime, tarayici_user_link.user_link_name, tarayici_user_link.user_link_link FROM tarayici_hanime_card_users, tarayici_user_link WHERE tarayici_hanime_card_users.user_card_title_ha = tarayici_hanime_card_users.user_card_name_ha");
        $anime_sorgu = "SELECT * FROM tarayici_hanime_card_users, tarayici_user_link ORDER BY RAND() LIMIT 1";
        $anime_sorgukontrol = $db->query($anime_sorgu);
        while ($cikti = $anime_sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
            if($cikti['hanime_allow'] == 'false'){
                break;
            }else{
                echo '</div><div class="card text-white f-right col-md-5 mb-2" style="background-color: #3c3c3c; margin-left: 0px;">
<span class="badge badge-danger card-header text-center"style="font-size: smaller">Random HAnimeler (Oluşturan Kullanıcı: ' . $cikti['user_card_username_ha'] . ')</span>
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
    <a class="btn-sm btn-outline-info mb-1 mt-1 text-center align-self-center mx-1" type="button" href="/Nova-Search/anime_hanime_ekle.php" style="max-width: 260px;" data-ripple-color="dark">Sizde sitenizden link koymak istermisiniz?</a>
';

            }
            }
    }

    ?>
</div>


