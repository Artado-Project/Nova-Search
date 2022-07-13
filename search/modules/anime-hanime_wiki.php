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