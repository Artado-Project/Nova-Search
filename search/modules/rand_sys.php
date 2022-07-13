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