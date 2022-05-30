<?php

	$q = htmlspecialchars($_GET["q"]);

	$kontrol = explode("'", $q);
	if($kontrol[0] == true){
		$q = str_replace("'", '&#39;', $q);
	}
	if($kontrol_2 = substr($q, 0,1) == "'"){
		$q = str_replace("'", "&#39;", $q);
	}
	if($son = substr($q, 0, 1) == "<"){

		header('Location: index.php?Tehlikeli_arama=true');
	}

	if(isset($_POST['web'])){
		header('Location: sonuc.php?q='.htmlspecialchars($q).'&type_web');
	}
	elseif(isset($_POST['gorsel'])){
		header('Location: sonuc.php?q='.htmlspecialchars($q).'&type_gorsel');
	}
	elseif(isset($_POST['bilgi'])){
		header('Location: sonuc.php?q='.htmlspecialchars($q).'&type_bilgi');
	}
	elseif(isset($_POST['akademi'])){
		header('Location: sonuc.php?q='.htmlspecialchars($q).'&type_bilisim');
	}
	elseif(isset($_POST['anime'])){
		header('Location: sonuc.php?q='.htmlspecialchars($q).'&type_anime');
	}
