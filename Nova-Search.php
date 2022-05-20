<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo @$_GET['q'];?> - Nova Search</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <style>
        .fontlu{
            font-family: 'Quicksand', sans-serif;
        }
        a{
            color: white;
            transition: 0.5s;

        }
        .anti_a{
            pointer-events: none;
        }
        a:hover{
            color: gray;
        }
    </style>

</head>
<body style="background-color: #3c3c3c">
<div class="container">
   <div class="mt-3"></div>
    <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a
                class="nav-link active"
                id="ex3-tab-1"
                data-mdb-toggle="tab"
                href="#ex3-tabs-1"
                role="tab"
                style="border-radius: 10px; max-width: 430px;"
                aria-controls="ex3-tabs-1"
                aria-selected="true"
            >Nova Search</a
            >
        </li>
        <li class="nav-item" role="presentation">
            <a style="border-radius: 10px; max-width: 430px;"
                class="nav-link"
                id="ex3-tab-2"
                data-mdb-toggle="tab"
                href="#ex3-tabs-2"
                role="tab"
                aria-controls="ex3-tabs-2"
                aria-selected="false"
            >Destekçiler</a
            >
        </li>
        <li class="nav-item" role="presentation">
            <a style="border-radius: 10px; max-width: 430px;"
                class="nav-link"
                id="ex3-tab-3"
                data-mdb-toggle="tab"
                href="#ex3-tabs-3"
                role="tab"
                aria-controls="ex3-tabs-3"
                aria-selected="false"
            >İletişim</a
            >
        </li>
    </ul>

    <div class="tab-content" id="ex2-content">
        <div
            class="tab-pane fade show active"
            id="ex3-tabs-1"
            role="tabpanel"
            aria-labelledby="ex3-tab-1"
        >
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <h5>Nova Search Nedir?</h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                        <div class="accordion-body">
                            Nova Search, Artado Software bünyesinde Reklamsız ve tamamen gizliği ön planda tutan Anime(Japon Çizgi Filmi) temalı aynı zamanda açık kaynak kodlu bir arama motorudur.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                            <h5>Diğer Arama Motorlarından Farkı?</h5>

                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            Nova Search'in diğer arama motorlarından farkı çerez kullanmamasıdır. hiçbir çereziniz kaydedilmez yanlızca Session dediğimiz
                            sunucularda tutulur ve Tarayıcının kapanmasıyla verileriniz silinir ayrıca tasarımsal olarak farkılıklarımız bizi diğer Arama Motorlarımızdan ayıran ek
                            Özelliklerimizden biri. Diğer arama motorlarına kıyasla Sade ve Hoş tasarımı ile ön plana çıkmaktadır.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree">
                            <h5>Artado Search</h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                        <div class="accordion-body">
                            2018 yılında Arda Tahtacı tarafından kurulan Artado Software, hem mobil hem de bilgisayar platformlarında oyun, uygulama ve yazılım geliştiren Türkiye merkezli bir topluluktur. Artado Search, Artado Software Altında geliştirilen bir Arama Motorudur
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSon">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseSon" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseSon">
                            <h5>Nova Manifestosu</h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseSon" class="accordion-collapse collapse" aria-labelledby="headingSon">
                        <div class="accordion-body">
                            Günümüzde internet en büyük iletişim ve bilgi alışveriş aracı. İnternet sayesinde yeni insanlarla tanışabiliyor, yeni bilgiler öğrenebiliyor ve tecrübelerimizi insanlarla paylaşabiliyoruz. İnternet şu ana kadar insan ırkının yaptığı en büyük icatlardan biridir. İnternet hayatımızı kolaylaştırıyor. Ne yazık ki bu büyük icada herkes özgürce erişememekte. Biz internetin herkes tarafından özgürce erişebilmesini istiyoruz. İnternet hiç bir güç veya otorite tarafından kısıtlanmamalı. İnternetteki bilgi birikimine özgürce erişebilmek bireylerin hakkıdır.
                            <div class="mb-4"></div>
                            <div class="note note-primary">Biz herkesin özgürce bilgi alışverişi yapabildiği, kişisel verilere saygı duyulan ve fikirlerin herhangi bir sansüre maruz bırakılmadan ifade edilebildiği bir interneti savunuyoruz.</div>
                            <div class="mb-5"></div>
                            <h5>Neden Özgür İnternet?</h5><br>
                            <p>İnsanların herhangi bir şeyi en hızlı ve en etkili olarak sadece internet üzerinden paylaşabilir. İnternet sayesinde çok hızlı bir şekilde milyonlar ile iletişim kurabilirsiniz. İnternet, halkın sesinin en iyi şekilde çıkarabileceği araçtır. Bu yüzden internet herkes tarafından özgürce erişebilmelidir.</p><br>
                            <p>Fikir özgürlüğü, demokrasinin temellerinden biridir. Demokrasi ile yönetilen ülkelerde fikir özgürlüğünün kısıtlanması, demokrasiye ve halka ihanettir. Fikir özgürlüğü, sadece demokratik ülkelerde değil bütün insanlık çapında bir hak olmalıdır. İnternet bu hakkın yerine getirlebilmesi için bir araçtır. Bu aracı kısıtlamak bireyin en temel haklarından birini yok saymaktır. </p><br>
                            <h5>Anonimlik</h5><br>
                            <p> İnternetin bireylere kattığı en önemli şeylerden biride anonimliktir ama anonimlik suistimal edilip kötüye kullanılabiliyor. Bunun çözümü interneti kısıtlamak veya anonimliği tamamen kaldırmak değildir. Bunun en temel ve kesin çözümü eğitim ve adaleti sağlamaktır. </p><br>
                            <p>Fikir özgürlüğünü iyi bir şekilde sağlanan eğitimli bir birey anonimliğe ihtiyaç duymaz. Çünkü fikirlerini düzgünce belirttiğinde başına bir şey gelmeyeceğini bilir ve iyi bir eğitim aldığından anonimliği kötüye kullanmaz. Anonim bir şekilde fikir belirten bireyler genelde fikir özgürlüğü olmayan bireylerdir. Birey, başına kötü şeyler gelebileceğinden anonim bir şekilde fikir belirttir. Bunu önlemek isteyen otoritereler anonimliği kaldırmaya veya interneti kısıtlamaya çalışır. </p><br>
                            <p> İnternetin sunduğu anonim kimlikler fikir özgürlüğü olmayan bireyler için fikir özgürlüğü sağlar. </p><br>
                            <h5>Gizlilik Hakkı</h5><br>
                            <p>Bireylerin en temel haklarından biride gizliliktir. Bireylerin kişisel verileri, internet üzerinden kullandıkları araçlar ile toplanmamalıdır. Bireyin kişisel verisi ona özeldir ve ondan izinsiz bir şekilde alınması suçtur. Nova Search olarak bireylerin kişisel verilerine saygı duyuyoruz ve internette özgürce gezinmek ve kişisel verileri korumak için çaba gösteriyoruz. Bireyler, kişisel verilerini korumak için doğru araçları seçme sorumluluğundadır. </p><br>
                            <h5>İnterneti Daha Güzel Bir Yer Yapmak İçin</h5><br>
                            <p>İnternet yukardaki 3 maddede yazılanlar uygulandığında gerçekten güzel bir yer olacaktır. 21. yüzyılda internet hem bir eğlence ağı, hem de bir iletişim ağıdır. İnternet, insanlığın gelişmesi için en önemli etkenlerden biridir. Artado'nun bir dalı olarak yukardaki maddeleri destekliyor ve sizi de desteklemeye davet ediyoruz. İnternet, birlik olduğumuzda daha güzel bir yer olacaktır! </p>
                            <div class="note note-warning" style="max-width: 300px;">Artado Manifestosunun devamıdır...</div>
                        </div>
                    </div>
                </div>
            </div><br>
        </div>
        <div
            class="tab-pane fade"
            id="ex3-tabs-2"
            role="tabpanel"
            aria-labelledby="ex3-tab-2"
        >
            <div class="mb-3"></div>
            <h2 class="fontlu text-center text-white">Güncelleme notları</h2>
            <div class="mb-4"></div>
            <div class="row justify-content-center">
                <div class="card">
                    <h3 class="card-header text-center">Nisan Güncellemesi - 08.05.2022</h3>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-mdb-toggle="collapse"
                                            data-mdb-target="#flush-collapseOne"
                                            aria-expanded="false"
                                            aria-controls="flush-collapseOne"
                                    >
                                        Nova MyAccount
                                    </button>
                                </h2>
                                <div
                                        id="flush-collapseOne"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne"
                                        data-mdb-parent="#accordionFlushExample"
                                >
                                    <div class="accordion-body">
                                        Nova MyAccount sayesinde Nova ve Artado My Account'u kullanan 3.parti yazılımlara direkt kayıt olmadan giriş yapabiliceksiniz.  My Account'da hiç bir veriniz izinsiz bir şekilde hiç bir 3. parti servise veya kişiye verilmez. Kullanıcıların şifreleri, şifreleme algoritması ile şifrelenerek kaydedilir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-mdb-toggle="collapse"
                                            data-mdb-target="#flush-collapseTwo"
                                            aria-expanded="false"
                                            aria-controls="flush-collapseTwo"
                                    >
                                        Nova Anime Card
                                    </button>
                                </h2>
                                <div
                                        id="flush-collapseTwo"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo"
                                        data-mdb-parent="#accordionFlushExample"
                                >
                                    <div class="accordion-body">
                                        Nova Anime Kartları random olarak gösterilir. Her aramanızda yeni bir anime gösterir ek olarak eklenen animelere kendi sitenizden link koyabilir veya olmayan bir animeyi oluşturabilirsiniz.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-mdb-toggle="collapse"
                                            data-mdb-target="#flush-collapseThree"
                                            aria-expanded="false"
                                            aria-controls="flush-collapseThree"
                                    >
                                        Tasarımsal Güncellemeler
                                    </button>
                                </h2>
                                <div
                                        id="flush-collapseThree"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree"
                                        data-mdb-parent="#accordionFlushExample"
                                >
                                    <div class="accordion-body">
                                        <p>-Arama Motoru Modallar ile zenginleştirildi</p>
                                        <p>-Nova Wiki için bot yazıldı</p>
                                        <p>-+18 Aramalar için uyarı eklendi</p>
                                        <p>-Arama Motoru Tamamen Responsive bir hale getirldi</p>
                                        <p>-Tasarımsal hatalar kapatıldı</p>
                                        <p>-Nova Sözlük eklendi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="tab-pane fade"
            id="ex3-tabs-3"
            role="tabpanel"
            aria-labelledby="ex3-tab-3"
        >
            Tab 3 content
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/mdb.min.js"></script>
</body>
