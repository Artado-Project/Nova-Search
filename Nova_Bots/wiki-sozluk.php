<?php

	if(isset($_POST['ks'])){

		$s_b = $_POST['ks_b'];
		$s_t = $_POST['ks_t'];
		$s_o = 'false';

		$kontrol = $db->prepare('SELECT * FROM tarayici_sozluk WHERE sozluk_baslik = ?');
		$kontrol->execute(array($s_b));
		if($kontrol->rowCount() > 0){
			echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz sözlük daha önceden eklenmiş!.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
		}else{
			$ekle = $db->prepare('INSERT INTO tarayici_sozluk SET sozluk_baslik = ?, sozluk_aciklama = ?, sozluk_onay = ? ');
			$ekle->execute(array($s_b, $s_t, $s_o));

			if($ekle){
				echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Bilgilendirme!</strong> Sözlük ekleme işlemi başarılı!.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
			}else{
				echo '
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                  <strong>HATA!</strong> BİR HATA MEYDANA GELDİ <code>Wiki-Sözlük - HATA NO: 30</code>!.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
			}

		}

	}
	if(isset($_POST['kw'])){
		$kw_b = $_POST['kw_b'];
		$kw_i = $_POST['kw_i'];
		$kw_m = $_POST['kw_m'];
		$kw_kl = $_POST['kw_kl'];
		$kw_ka = $_POST['kw_ka'];
		$kw_t = $_POST['kw_t'];

		$kontrol = $db->prepare('SELECT * FROM tarayici_card_wiki WHERE card_baslik = ?');
		$kontrol->execute(array($kw_b));
		if($kontrol->rowCount() > 0){
			echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz sözlük daha önceden eklenmiş!.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
		}else{
			$ekle = $db->prepare('INSERT INTO tarayici_card_wiki SET card_baslik = ?, card_muted = ?, card_text = ?, card_image = ?, card_kaynak = ?, card_link = ?');
			$ekle->execute(array($kw_b, $kw_m, $kw_t, $kw_i, $kw_ka, $kw_kl));

			if($ekle){
				echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  <strong>Bilgilendirme!</strong> Wiki ekleme işlemi başarılı!.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
			}
			else{
				echo '
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                  <strong>HATA!</strong> BİR HATA MEYDANA GELDİ <code>Wiki-Sözlük - HATA NO: 68</code>!.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
			}

		}

	}