<?php
require 'php/baglan.php';

if(isset($_POST['sikayet'])){

	$isim = $_POST['s_isim'];
	$konu = $_POST['s_konu'];
	$baslik = $_POST['s_baslik'];
	$mesaj = $_POST['s_mesaj'];

	try{

		if(isset($_SESSION['isim'])){

			$veri_ekle = $db->prepare("INSERT INTO tarayici_sikayet (sikayet_isim, sikayet_konu, sikayet_baslik, sikayet_mesaj) VALUES (?,?,?,?)");
			$veri_ekle->execute([
				$isim, $konu, $baslik, $mesaj
			]);

		}else{

			$email = $_POST['s_email'];

			$veri_ekle = $db->prepare("INSERT INTO tarayici_sikayet (sikayet_isim, sikayet_email_not_required, sikayet_konu, sikayet_baslik, sikayet_mesaj) VALUES (?,?,?,?)");
			$veri_ekle->execute([
				$isim, $email, $konu, $baslik, $mesaj
			]);

		}

		if(!isset($veri_ekle)){
			echo '<div class="alert alert-danger">Sayın kullanıcımız, Anlaşılan bir hata ile baş başasınız lütfen Discord Sunucumuz üzerinden bize şikayetinizi bildiriniz. Teknik aksaklık için içtenlikle özür dileriz (HATA: LoliBots/sikayet.php, LİNE: 15-24)</div>';
		}else{
			echo '<div class="alert alert-danger">Sayın kullanıcımız, Şikayetiniz tarafımıza gönderilmiştir. Şikayetiniz incelendikten sonra tarafınıza dönüş yapılacaktır iyi günler dileriz.</div>';
		}

	}catch (Exception $e){
		echo $e->getMessage();
	}

}