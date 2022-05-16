<?php

require 'php/baglan.php';

if(isset($_POST['sozluk'])){

    $baslik = $_POST['s_link'];
    $acik = $_POST['s_aciklama'];
    $onay = 'false';

    try {

        $kontrol = $db->prepare("SELECT * FROM tarayici_sozluk WHERE sozluk_baslik = ?");
        $kontrol->execute(array($baslik));
        if($kontrol->rowCount() > 0){
            echo '<div class="alert alert-danger">Veri daha önce eklenmiş!</div>';
        }else{
            $ekle = $db->prepare("INSERT INTO tarayici_sozluk (sozluk_baslik, sozluk_aciklama, sozluk_onay) VALUES (?,?,?)");
            $ekle->execute([
               $baslik, $acik, $onay
            ]);

            if(!isset($ekle)){
                echo '<div class="alert alert-danger">Bir hata meydana geldi</div>';
            }else{
                echo '<div class="alert alert-info">Kelime ekleme işlemi tamamlandı!</div>';
            }
        }

    }catch (Exception $e){
        echo $e->getMessage();
    }

}