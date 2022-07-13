<div class="card text-white f-right col-md-5" style="background-color: #3c3c3c;">
    <span class="badge badge-secondary card-header text-center" style="font-size: smaller">Son Eklenen Bilgi Kutusu</span>
    <div class="card-header">
        <?php
        $card_new = $db->prepare("SELECT * FROM tarayici_card_wiki ORDER BY id DESC LIMIT 0,1");
        $card_new->execute(array());
        while ($veri_cek = $card_new->fetch(PDO::FETCH_ASSOC)){
            echo ' <img src="'.$veri_cek['card_image'].'" class="rounded-1 f-right" style="max-width: 200px; max-height: 220px;"> 
                                <h1 class="fontlu">'. $veri_cek['card_baslik'] .'</h1>
                                <h5 class="text-muted fontlu">'. $veri_cek['card_muted'] .'</h5>
                                <br>
                                <p class="mb-5 text-decoration-none anti_a">'. $veri_cek['card_text'] .'...</p>
                                <a href="'. $veri_cek['card_link'] .'"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">'. $veri_cek['card_kaynak'] .'</div>
                                </a>';
        }

        ?>
    </div>
</div>