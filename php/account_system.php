<?php

if(isset($_POST['n_u'])){
    $newname = $_POST['new_username'];
    $suan = $_SESSION['isim'];

    $sorgu = $db->prepare("UPDATE tarayici_kayit SET uye_kadi = ? WHERE uye_kadi = '$suan'");
    $sorgufs = $db->prepare("UPDATE tarayici_card_anime_users SET user_card_username = ? WHERE user_card_username = '$suan'");
    $sorgua = $db->prepare("UPDATE tarayici_hanime_card_users SET user_card_username_ha = ? WHERE user_card_username_ha = '$suan'");

    $kontrol = $db->prepare("SELECT * FROM tarayici_kayit WHERE uye_kadi = '$newname'");
    $kontrol->execute();

    $sorgu->bindParam(1, $newname, PDO::PARAM_STR);
    $sorgufs->bindParam(1, $newname, PDO::PARAM_STR);
    $sorgua->bindParam(1, $newname, PDO::PARAM_STR);


    $sorgu->execute();$sorgufs->execute();$sorgua->execute();

    if($kontrol->rowCount() > 0) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Kullanıcı adı başkası tarafından alınmış.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
        if ($sorgu->rowCount() > 0 AND $sorgufs->rowCount() > 0 AND $sorgua->rowCount() > 0) {
            echo'<div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Kullanıcı adınız değiştirilmiştir.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            $_SESSION['isim'] = $newname;
            header("Location: myacc.php");
        } else {
            echo '<div class="alert alert-danger">Bir hata meydana geldi! <div class="f-right">Hata kodu: MY_ACC:35</div> </div>';
        }
    }
}

if(isset($_POST['pp'])){
    $pp = $_POST['uye_pp'];
    $suan = $_SESSION['isim'];
    $sorgu = $db->prepare("UPDATE tarayici_kayit SET uye_pp = ? WHERE uye_kadi = '$suan'");
    $sorgu->bindParam(1, $pp, PDO::PARAM_STR);
    $sorgu->execute();

    if (isset($sorgu)) {
        echo'<div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Profil Fotoğrafınız değiştirilmiştir.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        $_SESSION['pp'] = $pp;
        echo '<meta http-equiv="refresh" content="3;url=myacc.php">';
    } else {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Lütfen daha sonra tekrar deneyiniz!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}

if(isset($_POST['newpass'])){
    $yenis = md5($_POST['newpass_pass']);
    $yenist = md5($_POST['newpass_pass_again']);

    if($yenis != $yenist){
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Giridiğiniz şifreler eşleşmemektedir lütfen kontrol edip tekrar deneyiniz!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else{
        $suan = $_SESSION['isim'];
        $sorgu = $db->prepare("UPDATE tarayici_kayit SET uye_sifre = ? WHERE uye_kadi = '$suan'");
        $sorgu->bindParam(1, $yenis, PDO::PARAM_STR);
        $sorgu->execute();

        if(isset($sorgu)){
            echo'<div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Şifreniz başarıyla değiştirilmiştir.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else {
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Lütfen daha sonra tekrar deneyiniz!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
}
if (isset($_POST['hesapsil'])){
    $suan = $_SESSION['isim'];
    $sil = $db->prepare("DELETE FROM tarayici_kayit WHERE uye_kadi = '$suan'");
    if ($sil){
        echo '<div class="alert alert-danger alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Hesabınız silinmiştir çıkış yapılıyor...!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        header("Location: index.php");
        session_destroy();
    }
}