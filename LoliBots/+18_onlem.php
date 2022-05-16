<?php

$suicide = array(
    "intihar", "intihar yöntemleri", "intihar etmek", "intihar nedir", "ölmek istiyorum", "suicide", "4chan"
);

$q = @$_GET['q'];

if(in_array($q, $suicide)){
    echo '<div class="alert alert-danger">Sayın kullanıcımız İntihar konulu bir araştırma yaptığınızı fark ettik. eğer ki aklınızda bir intihar düşüncesi var ise lütfen <a href="tel:112">Bu numarayı</a> arayarak destek talep ediniz!</div>';
}



