<div class="card text-white mb-2 col-md-12"  style="background: #3c3c3c">
    <?php
    $card_sozluk = $db->prepare("SELECT * FROM tarayici_sozluk");
    $card_sozluk->execute(array($q));
    $card_sozluk_ck = $card_sozluk->fetch(PDO::FETCH_ASSOC);
    if($card_sozluk_ck > 0){
        $sozluk_sorgu = "SELECT * FROM tarayici_sozluk WHERE sozluk_baslik LIKE '%$q%' LIMIT 1";
        $sozluk_kontrol = $db->query($sozluk_sorgu);
        while($cikti = $sozluk_kontrol->fetch(PDO::FETCH_ASSOC)){
            echo '<span class="badge card-header badge-info"style="font-size: smaller">Nova Sözlük</span><div class="card-header text-center fontlu"><h3>'.$cikti['sozluk_baslik'].'</h3></div>
                                  <div class="card-body fontlu">'.$cikti['sozluk_aciklama'].'</div>';

        }
    }
    ?>
</div>