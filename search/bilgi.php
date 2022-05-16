<div class="row">
	<div class="col-md-7">
		<div class="card text-white" style="background-color: #3c3c3c">
			<script async src="https://cse.google.com/cse.js?cx=dc6619b984f0ccb91"></script>
			<div class="gcse-searchresults-only"></div>
		</div>
	</div>

	<?php
		$card_sozluk = $db->prepare("SELECT * FROM tarayici_sozluk ");
		$card_sozluk->execute(array($q));
		$card_sozluk_ck = $card_sozluk->fetch(PDO::FETCH_ASSOC);
		if($card_sozluk_ck > 0){
			$sozluk_sorgu = "SELECT * FROM tarayici_sozluk WHERE sozluk_baslik LIKE '%$q%' LIMIT 5";
			$sozluk_kontrol = $db->query($sozluk_sorgu);
			while($cikti = $sozluk_kontrol->fetch(PDO::FETCH_ASSOC)){
				echo '<div class="card col-md-3 mx-1 text-white" style="background-color: #3c3c3c; max-height: 500px;"><span class="badge badge-info" >Loli Sözlük</span><div class="card-header text-center fontlu"><h3>'.$cikti['sozluk_baslik'].'</h3></div>
                                  <div class="card-body fontlu">'.$cikti['sozluk_aciklama'].'</div></div>';

			}if ($sozluk_kontrol->rowCount() == 0){
				echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-3 mx-1" style="max-height: 110px" role="alert">
                  <strong>Dikkat!</strong> Sayın kullanıcımız <strong>'.$q.'</strong> ile ilgili bir sözlük sonucu bulunamadı...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
			}
		}

	?>
