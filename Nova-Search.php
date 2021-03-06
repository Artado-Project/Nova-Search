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
            >G??ncelleme Notlar??</a
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
            >??leti??im</a
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
                            Nova Search, Artado Software b??nyesinde Reklams??z ve tamamen gizli??i ??n planda tutan Anime(Japon ??izgi Filmi) temal?? ayn?? zamanda a????k kaynak kodlu bir arama motorudur.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                            <h5>Di??er Arama Motorlar??ndan Fark???</h5>

                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            Nova Search'in di??er arama motorlar??ndan fark?? ??erez kullanmamas??d??r. hi??bir ??ereziniz kaydedilmez yanl??zca Session dedi??imiz
                            sunucularda tutulur ve Taray??c??n??n kapanmas??yla verileriniz silinir ayr??ca tasar??msal olarak fark??l??klar??m??z bizi di??er Arama Motorlar??m??zdan ay??ran ek
                            ??zelliklerimizden biri. Di??er arama motorlar??na k??yasla Sade ve Ho?? tasar??m?? ile ??n plana ????kmaktad??r.
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
                            2018 y??l??nda Arda Tahtac?? taraf??ndan kurulan Artado Software, hem mobil hem de bilgisayar platformlar??nda oyun, uygulama ve yaz??l??m geli??tiren T??rkiye merkezli bir topluluktur. Artado Search, Artado Software Alt??nda geli??tirilen bir Arama Motorudur
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
                            G??n??m??zde internet en b??y??k ileti??im ve bilgi al????veri?? arac??. ??nternet sayesinde yeni insanlarla tan????abiliyor, yeni bilgiler ????renebiliyor ve tecr??belerimizi insanlarla payla??abiliyoruz. ??nternet ??u ana kadar insan ??rk??n??n yapt?????? en b??y??k icatlardan biridir. ??nternet hayat??m??z?? kolayla??t??r??yor. Ne yaz??k ki bu b??y??k icada herkes ??zg??rce eri??ememekte. Biz internetin herkes taraf??ndan ??zg??rce eri??ebilmesini istiyoruz. ??nternet hi?? bir g???? veya otorite taraf??ndan k??s??tlanmamal??. ??nternetteki bilgi birikimine ??zg??rce eri??ebilmek bireylerin hakk??d??r.
                            <div class="mb-4"></div>
                            <div class="note note-primary">Biz herkesin ??zg??rce bilgi al????veri??i yapabildi??i, ki??isel verilere sayg?? duyulan ve fikirlerin herhangi bir sans??re maruz b??rak??lmadan ifade edilebildi??i bir interneti savunuyoruz.</div>
                            <div class="mb-5"></div>
                            <h5>Neden ??zg??r ??nternet?</h5><br>
                            <p>??nsanlar??n herhangi bir ??eyi en h??zl?? ve en etkili olarak sadece internet ??zerinden payla??abilir. ??nternet sayesinde ??ok h??zl?? bir ??ekilde milyonlar ile ileti??im kurabilirsiniz. ??nternet, halk??n sesinin en iyi ??ekilde ????karabilece??i ara??t??r. Bu y??zden internet herkes taraf??ndan ??zg??rce eri??ebilmelidir.</p><br>
                            <p>Fikir ??zg??rl??????, demokrasinin temellerinden biridir. Demokrasi ile y??netilen ??lkelerde fikir ??zg??rl??????n??n k??s??tlanmas??, demokrasiye ve halka ihanettir. Fikir ??zg??rl??????, sadece demokratik ??lkelerde de??il b??t??n insanl??k ??ap??nda bir hak olmal??d??r. ??nternet bu hakk??n yerine getirlebilmesi i??in bir ara??t??r. Bu arac?? k??s??tlamak bireyin en temel haklar??ndan birini yok saymakt??r. </p><br>
                            <h5>Anonimlik</h5><br>
                            <p> ??nternetin bireylere katt?????? en ??nemli ??eylerden biride anonimliktir ama anonimlik suistimal edilip k??t??ye kullan??labiliyor. Bunun ????z??m?? interneti k??s??tlamak veya anonimli??i tamamen kald??rmak de??ildir. Bunun en temel ve kesin ????z??m?? e??itim ve adaleti sa??lamakt??r. </p><br>
                            <p>Fikir ??zg??rl??????n?? iyi bir ??ekilde sa??lanan e??itimli bir birey anonimli??e ihtiya?? duymaz. ????nk?? fikirlerini d??zg??nce belirtti??inde ba????na bir ??ey gelmeyece??ini bilir ve iyi bir e??itim ald??????ndan anonimli??i k??t??ye kullanmaz. Anonim bir ??ekilde fikir belirten bireyler genelde fikir ??zg??rl?????? olmayan bireylerdir. Birey, ba????na k??t?? ??eyler gelebilece??inden anonim bir ??ekilde fikir belirttir. Bunu ??nlemek isteyen otoritereler anonimli??i kald??rmaya veya interneti k??s??tlamaya ??al??????r. </p><br>
                            <p> ??nternetin sundu??u anonim kimlikler fikir ??zg??rl?????? olmayan bireyler i??in fikir ??zg??rl?????? sa??lar. </p><br>
                            <h5>Gizlilik Hakk??</h5><br>
                            <p>Bireylerin en temel haklar??ndan biride gizliliktir. Bireylerin ki??isel verileri, internet ??zerinden kulland??klar?? ara??lar ile toplanmamal??d??r. Bireyin ki??isel verisi ona ??zeldir ve ondan izinsiz bir ??ekilde al??nmas?? su??tur. Nova Search olarak bireylerin ki??isel verilerine sayg?? duyuyoruz ve internette ??zg??rce gezinmek ve ki??isel verileri korumak i??in ??aba g??steriyoruz. Bireyler, ki??isel verilerini korumak i??in do??ru ara??lar?? se??me sorumlulu??undad??r. </p><br>
                            <h5>??nterneti Daha G??zel Bir Yer Yapmak ????in</h5><br>
                            <p>??nternet yukardaki 3 maddede yaz??lanlar uyguland??????nda ger??ekten g??zel bir yer olacakt??r. 21. y??zy??lda internet hem bir e??lence a????, hem de bir ileti??im a????d??r. ??nternet, insanl??????n geli??mesi i??in en ??nemli etkenlerden biridir. Artado'nun bir dal?? olarak yukardaki maddeleri destekliyor ve sizi de desteklemeye davet ediyoruz. ??nternet, birlik oldu??umuzda daha g??zel bir yer olacakt??r! </p>
                            <div class="note note-warning" style="max-width: 300px;">Artado Manifestosunun devam??d??r...</div>
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
            <h2 class="fontlu text-center text-white">G??ncelleme notlar??</h2>
            <div class="mb-4"></div>
            <div class="row justify-content-center">
                <div class="card">
                    <h3 class="card-header text-center">Nisan G??ncellemesi - 08.05.2022</h3>
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
                                        Nova MyAccount sayesinde Nova ve Artado My Account'u kullanan 3.parti yaz??l??mlara direkt kay??t olmadan giri?? yapabiliceksiniz.  My Account'da hi?? bir veriniz izinsiz bir ??ekilde hi?? bir 3. parti servise veya ki??iye verilmez. Kullan??c??lar??n ??ifreleri, ??ifreleme algoritmas?? ile ??ifrelenerek kaydedilir.
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
                                        Nova Anime Kartlar?? random olarak g??sterilir. Her araman??zda yeni bir anime g??sterir ek olarak eklenen animelere kendi sitenizden link koyabilir veya olmayan bir animeyi olu??turabilirsiniz.
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
                                        Tasar??msal G??ncellemeler
                                    </button>
                                </h2>
                                <div
                                        id="flush-collapseThree"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree"
                                        data-mdb-parent="#accordionFlushExample"
                                >
                                    <div class="accordion-body">
                                        <p>-Arama Motoru Modallar ile zenginle??tirildi</p>
                                        <p>-Nova Wiki i??in bot yaz??ld??</p>
                                        <p>-+18 Aramalar i??in uyar?? eklendi</p>
                                        <p>-Arama Motoru Tamamen Responsive bir hale getirldi</p>
                                        <p>-Tasar??msal hatalar kapat??ld??</p>
                                        <p>-Nova S??zl??k eklendi</p>
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
            --
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
