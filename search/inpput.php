<?php

	$q = @$_GET['q'];
	$w = @$_POST['web'];
	$g = @$_POST['gorsel'];
	$b = @$_POST['bilgi'];
	$a = @$_POST['akademi'];
	$ani = @$_POST['anime'];


	if($q == ""){
		$q = $w;
		if($q == ""){
			$q = $g;
			if($q == ""){
				$q = $b;
				if($q == ""){
					$q = $a;
					if($q == ""){
						$q = $ani;
						if($q == ""){
							header('Location: index.php');
						}
					}
				}
			}
		}
	}
