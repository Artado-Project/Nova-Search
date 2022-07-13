<?php

    $sorgu = $db->prepare("SELECT * FROM tarayici_haber WHERE haber_baslik LIKE '%$q%' LIMIT 3");
    $sorgu->execute(array($q));

    $c = $sorgu->fetch(PDO::FETCH_ASSOC);

    echo '<div class="row">';

    for($dondur = $sorgu->rowCount(); $dondur != 0; $dondur--){ ?>

        <div class="col-md-4">
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="<?php $c['haber_img'] ?>" class="img-fluid"/>
                    <a href="<?php $c['haber_link'] ?>">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php $c['haber_baslik'] ?></h5>
                    <p class="card-text"><?php $c['haber_text'] ?></p>
                    <a href="<?php $c['haber_link'] ?>" class="btn btn-primary"><?php $c['haber_kaynak'] ?></a>
                </div>
            </div>
        </div>

   <?php } echo '</div>'; ?>
