<?php

switch (connection_status()){

    case CONNECTION_NORMAL:
        $msg = '';
        break;

    case CONNECTION_ABORTED:
        $msg = '<div class="alert alert-danger">İnternet bağlantısı bulunamadı lütfen internet bağlantınızı kontrol edin!</div>';
        break;
    
    case CONNECTION_TIMEOUT:
        echo '<div class="alert alert-danger">İnternet bağlantınız zaman aşımına uğradı lütfen bağlantınızı kontrol ediniz!</div>';
        break;
    
    case (CONNECTION_ABORTED && CONNECTION_TIMEOUT):
        $msg = '<div class="alert alert-danger">Sayın kullanıcımız internet bağlantınız bulunamadı ve zaman aşımına uğradı lütfen internet bağlantınızı kontrol ediniz!</div>';
        break;

    default:
        $msg = '<div class="alert alert-danger">İnternet bağlantınız tanımlanamadı lütfen daha sonra tekrar deneyiniz veya internet bağlantınızı kontrol ediniz.</div>';
        break;
}

echo $msg;