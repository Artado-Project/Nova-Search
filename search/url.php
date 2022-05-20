<?php

	$q = $_GET['q'];


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
