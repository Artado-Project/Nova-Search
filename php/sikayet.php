<?php

require 'baglan.php';

  if(@$_POST['s']){

      $isim = $_SESSION['isim'];
      $konu = $_POST['s_konu'];
      $baslik = $_POST['s_baslik'];
      $mesaj = $_POST['s_mesaj'];


      if(isset($_SESSION['isim'])){
          $email = 'saved';
          $ekle = $db->prepare("INSERT INTO tarayici_sikayet (sikayet_isim, sikayet_email_not_required, sikayet_konu, sikayet_baslik, sikayet_mesaj) VALUES (?,?,?,?,?)");
          $ekle->execute(array(
             $isim, $email, $konu, $baslik, $mesaj
          ));

          if($ekle = true){
              header('Location: myacc.php');
          }
      }
      else{
          $email = $_POST['email'];

          $ekle = $db->prepare("INSERT INTO tarayici_sikayet (sikayet_isim, sikayet_email_not_required, sikayet_konu, sikayet_baslik, sikayet_mesaj) VALUES (?,?,?,?,?)");
          $ekle->execute(array(
              $isim, $email, $konu, $baslik, $mesaj
          ));

          if($ekle = true){
              echo '<div class="alert alert-info">Şikayetiniz alınmıştır!</div>';
              header('Refresh 3; Location: index.php');
          }
      }
  }