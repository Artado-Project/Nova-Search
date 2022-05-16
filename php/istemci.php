<?php
echo '<br><br>';
require 'baglan.php';
if(isset($_POST['k'])) {
    $kadi = $_POST['k-kadi'];
    $kemail = $_POST['k-email'];
    $ksifre = md5($_POST['k-pass']);
    $ksifretekrar = md5($_POST['k-pass-again']);
    if($ksifre != $ksifretekrar){
        echo '<div class="alert alert-warning">Şifreleriniz eşleşmiyor!</div>';
    }else {
        $EmailSay = $db->prepare("SELECT * FROM tarayici_kayit WHERE uye_email = ?");
        $EmailSay->execute(array($kemail));
        $kontrol = $EmailSay->fetch(PDO::FETCH_ASSOC);
        if($kontrol > 0)
        {
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz email kayıtlıdır.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else{
            try {
                $sorgu = $db ->prepare('INSERT INTO tarayici_kayit (uye_kadi, uye_email, uye_sifre) VALUES (?,?,?)');
                $ekle = $sorgu ->execute([
                    $kadi, $kemail, $ksifre
                ]);
            }catch (Exception $e){
                echo $e->getMessage();
            }
            if ($ekle) {
                echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  Kayıt işlemi <strong>Başarlı!</strong> Sayfa yenileniyor...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
                echo '<meta http-equiv="refresh" content="3;url=index.php">';
            } else {
                echo '
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                  <strong>Hata!</strong> Beklenmedik bir hata meydana geldi lütfen daha sonra tekrar deneyin.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }

}

if(isset($_POST['g'])){
    $gadi = $_POST['g-kadi'];
    $gsifre = md5($_POST['g-pass']);
    if (!$gadi) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Lütfen kullanıcı adınızı girin
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } elseif (!$gsifre) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Dikkat!</strong> Lütfen şifrenizi girin
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
        $kullanicisor = $db->prepare('SELECT * FROM tarayici_kayit WHERE uye_kadi = ? AND uye_sifre = ?');
        $kullanicisor->execute([
            $gadi, $gsifre
        ]);
        $say = $kullanicisor->rowCount();
        if ($say == 1) {
            $_SESSION['isim'] = $gadi;
            echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  Giriş işlemi <strong>Başarılı!</strong> Sayfa yenileniyor...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        } else {
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                  <strong>Hata!</strong> Böyle bir kullanıcı bulunamadı.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }

}
if(isset($_POST['bg'])){
    $bg = $_POST['bg_link'];
	$isim = $_SESSION['isim'];

    $sorgu = $db->prepare("UPDATE tarayici_kayit SET uye_bg = ? WHERE uye_kadi = '$isim'");
    $sorgu->execute(array($bg));

    if($sorgu = true){
        echo '<div class="alert alert-info">Arkaplanının başarıyla kaydedilmiştir. sayfa yenileniyor...</div>';
        echo '<meta http-equiv="refresh" content="3;url=index.php">';
    }else{
        echo '<div class="alert alert-danger">Bir hata meydana geldi lütfen hatanızı bildiriniz!</div>';
    }

}


