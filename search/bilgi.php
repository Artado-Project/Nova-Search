<div class="row">
    <div class="col-md-7">
        <div class="card text-white" style="background-color: #3c3c3c">
            <script async src="https://cse.google.com/cse.js?cx=dc6619b984f0ccb91"></script>
            <div class="gcse-searchresults-only"></div>
        </div>
    </div>
    <div class="col-md-5">
		<?php
			$card_wiki = $db->prepare("SELECT card_baslik, card_muted, card_text, card_image FROM tarayici_card_wiki ");
			$card_wiki->execute(array($q));
			$kontrol = $card_wiki->fetch(PDO::FETCH_ASSOC);
			if ($kontrol > 0) {
				$sorgu = "SELECT * FROM tarayici_card_wiki WHERE card_baslik LIKE '%$q%' LIMIT 1;";
				$sorgukontrol = $db->query($sorgu);
				while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
					echo '<div class="card text-white mb-2" style="background-color: #3c3c3c;"><span class="card-header text-center badge badge-success" style="font-size: smaller">Nova Wiki</span><div class="card-header">
                                <img src="'.$cikti['card_image'].'" class="rounded-1 f-right" style="max-width: 200px; max-height: 220px;"> 
                                <h1 class="fontlu">'. $cikti['card_baslik'] .'</h1>
                                <h5 class="text-muted fontlu">'. $cikti['card_muted'] .'</h5>
                                <br>
                                <p style="max-width: 1010x;" class="mb-5 text-white text-decoration-none anti_a">'. $cikti['card_text'] .'...</p>
                                <a href="'. $cikti['card_link'] .'"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">'. $cikti['card_kaynak'] .'</div>
                                </a>';
					if($q == "lgbt" OR $q == "lgb" OR $q == "eşcinsel" OR $q == "eşcinsel evlilik" ){
						echo '<a href="https://tr.wikipedia.org/wiki/Ahlaks%C4%B1zl%C4%B1k"><div class="btn-sm btn-outline-warning f-right" style="border-radius: 100px;" data-ripple-color="dark">Ayrıca bakınız: Toplumda Ahlak Yapısı</div></a>';
					}
					echo '</div></div>';
				}

			}else{
				echo '<div class="card-header">
                                <h1 class="text-center">Opps! bir hata meydana geldi!</h1>
                            </div>';
			}
		?>
		<?php
			$card_sozluk = $db->prepare("SELECT * FROM tarayici_sozluk ");
			$card_sozluk->execute(array($q));
			$card_sozluk_ck = $card_sozluk->fetch(PDO::FETCH_ASSOC);
			if($card_sozluk_ck > 0){
				$sozluk_sorgu = "SELECT * FROM tarayici_sozluk WHERE sozluk_baslik LIKE '%$q%' LIMIT 5";
				$sozluk_kontrol = $db->query($sozluk_sorgu);
				while($cikti = $sozluk_kontrol->fetch(PDO::FETCH_ASSOC)){
					echo '<div class="card text-white" style="background-color: #3c3c3c;"><span class="badge badge-info card-header" >Nova Sözlük</span><div class="card-header text-center fontlu"><h3>'.$cikti['sozluk_baslik'].'</h3></div>
                                  <div class="card-body fontlu">'.$cikti['sozluk_aciklama'].'</div></div>';

				}
			}

		?>
    </div>

