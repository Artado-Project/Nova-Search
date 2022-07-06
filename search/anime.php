<?php
	require 'Nova_Bots/+18_onlem.php';
?>

<!--Nova Anime Wiki-->
<div class="card text-white mb-2" style="background-color: #3c3c3c;">
	<?php
		$card_an = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
		$card_an->execute(array($q));
		$kontrol_an = $card_an->fetch(PDO::FETCH_ASSOC);
		if ($kontrol_an > 0) {
			$sorgu = "SELECT * FROM tarayici_card_anime_users WHERE user_card_title LIKE '%$q%' LIMIT 1;";
			$sorgukontrol = $db->query($sorgu);
			while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
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
				while($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)){
					if($cikti2['user_link_anime'] == $cikti['user_card_title']){
						echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
					}
				}echo '</div>';
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
<!--Nova Random Anime-->
	<?php

        for($b = 2; $b != 0; $b--){
			$card_anime = $db->prepare("SELECT tarayici_card_anime_users.user_card_title, tarayici_card_anime_users.user_card_muted, tarayici_card_anime_users.user_card_text, tarayici_card_anime_users.user_card_image, tarayici_card_anime_users.user_card_link, tarayici_card_anime_users.user_card_name, tarayici_card_anime_users.user_card_username tarayici_user_link.user_link_anime, tarayici_user_link.user_link_name, tarayici_user_link.user_link_link FROM tarayici_card_anime_users, tarayici_user_link WHERE tarayici_card_anime_users.user_card_title = tarayici_card_anime_users.user_card_name");
			$anime_sorgu = "SELECT * FROM tarayici_card_anime_users, tarayici_user_link ORDER BY RAND() LIMIT 1";
			$anime_sorgukontrol = $db->query($anime_sorgu);
			while ($cikti = $anime_sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
				echo '</div><div class="card text-white f-right col-md-5 mb-2" style="background-color: #3c3c3c; margin-left: 0px;">
<span class="badge badge-warning card-header text-center"style="font-size: smaller">Random Animeler (Oluşturan Kullanıcı: ' . $cikti['user_card_username'] . ')</span>
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
				}echo '</div>
    <a class="btn-sm btn-outline-info f-left mb-1 mt-1 text-center align-self-center mx-1" type="button" href="anime_hanime_ekle.php" style="max-width: 260px;" data-ripple-color="dark">Sizde sitenizden link koymak istermisiniz?</a>
    ';
			}
        }


	?>
</div>



