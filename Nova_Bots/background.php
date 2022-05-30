<?php

	if(isset($_POST['s'])) {

		if(isset($_SESSION['isim'])){

			$bg = $_POST['bg_link'];
			$name = $_SESSION['isim'];

			if($bg == ""){

				unset($_SESSION['bg']);

			}else{

				$ekle = $db->prepare("UPDATE tarayici_kayit SET uye_bg = ? WHERE uye_kadi = ?");
				$ekle->execute(array($bg, $name));

				$kontrol = $db->prepare("SELECT * FROM tarayici_kayit WHERE uye_kadi = ?");
				$kontrol->execute(array($name));

				$cıktı = $kontrol->fetch(PDO::FETCH_ASSOC);

				if($cıktı['uye_bg'] != ""){
					unset($_SESSION['bg']);
					$_SESSION['bg'] = $cıktı['uye_bg'];
				}
			}

			header('Location: index.php');
		}
		elseif(!isset($_SESSION['isim'])){

			$_SESSION['bg'] = $_POST['bg_link'];

		}

	}
