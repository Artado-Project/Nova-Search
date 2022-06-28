<?php
require 'php/baglan.php';

// Developed yasiw

function wiki_veri_al($baslik, $son, $detay){
    	@preg_match_all('/' . preg_quote($baslik, '/') .
        '(.*?)'. preg_quote($son, '/').'/i', $detay, $m);

    return @$m['1'];

}

if(isset($_POST['wikipedia'])) {
    $wikipedia_veri = $_POST['w_link'];
    $veri_cek = file_get_contents($wikipedia_veri);


    $wikipedia_baslik = wiki_veri_al('<h1 id="firstHeading" class="firstHeading mw-first-heading">', '</h1>', $veri_cek);
    $wikipedia_muted = wiki_veri_al('<div class="tagline">', '</div>', $veri_cek);
    //$wikipedia_image = wiki_veri_al('<div class="thumbinner" style="width:222px;">','</a>', $veri_cek);
    $wikipedia_detay = wiki_veri_al('<p>', '</p>', $veri_cek);
    
    $baslik = $wikipedia_baslik[0];
    $muted = $wikipedia_muted[0];
    $detay = $wikipedia_detay[0];
    $wiki_image = $_POST['w_image'];
    $kaynak = 'Wikipedia';
    $link = $wikipedia_veri;
    $added_by_bot = 'true';

    try {
        $kontrol = $db->prepare("SELECT * FROM tarayici_card_wiki WHERE card_link='$wikipedia_veri'");
        $kontrol->execute(array());
        if ($kontrol->rowCount() > 0) {
            echo '<div class="alert alert-danger">Veri zaten eklenmiş!!!!!</div>';
        } else {
            $veri_ekle = $db->prepare(" INSERT INTO tarayici_card_wiki (card_baslik, card_muted, card_text, card_image, card_kaynak, card_link, card_bot) VALUES (?,?,?,?,?,?,?)");
            $veri_ekle->execute([
                $baslik, $muted, $detay, $wiki_image, $kaynak, $link, $added_by_bot
            ]);

            if (!isset($veri_ekle)) {
                echo '<div class="alert alert-danger">Bir hata meydana geldi!</div>';
            } else {
                echo '<div class="alert alert-info">İşlem başarılı</div>';
            }
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

