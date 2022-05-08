<?php

$porn = array(
    "doeda", "pornhub", "brazzers", "hdabla", "inpin", "xnxx", "xxx", "womanexplorer", "youjizz", "yourbitches", "twitter ifşa", "ifşa", "telegram ifşa", "sex", "porno", "seks"
);
$execution = array(
    "telegram infaz", "killer", "katil", "infaz", "kafa kesme", "terörist infaz", "dark fetish"
);
$suicide = array(
    "intihar", "intihar yöntemleri", "intihar etmek", "intihar nedir", "ölmek istiyorum", "suicide", "4chan"
);

$q = $_GET['q'];

if(in_array($q, $porn)){
    echo '<div class="alert alert-danger">Sayın kullanıcımız +18 sitelere girmek <a href="https://barandogan.av.tr/turk-ceza-kanunu.html#Madde-134">Türk Ceza Kanunun 134-135-136</a> Maddelerini ihlal ediyor olabilir LoliSearch ilerlemeniz durumunda hiçbir şekilde zorumluluk kabul etmemektedir.</div>';
}if(in_array($q, $execution)){
    echo '<div class="alert alert-danger">Sayın kullanıcımız İnfaz konulu bir arama yaptığınızı fark ettik. Yaptığınız arama <a href="https://barandogan.av.tr/turk-ceza-kanunu.html#Madde-83">Türk Ceza Kanunun 1.Bölüm: 81-82-83-84-85, 2.Bölüm: 86-87-88-89-90</a> Maddelerini ihlal ediyor olabilir LoliSearch ilerlemeniz durumunda hiçbir şekilde zorumluluk kabul etmemektedir.</div>';
}if(in_array($q, $suicide)){
    echo '<div class="alert alert-danger">Sayın kullanıcımız İntihar konulu bir araştırma yaptığınızı fark ettik. eğer ki aklınızda bir intihar düşüncesi var ise lütfen <a href="tel:112">Bu numarayı</a> arayarak destek talep ediniz!</div>';
}



