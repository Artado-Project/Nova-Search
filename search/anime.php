<?php
	require 'Nova_Bots/+18_onlem.php';
?>

<!--Nova Anime Wiki-->
<div class="card text-white mb-2" style="background-color: #3c3c3c;">
	<?php
		$card_an = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
		$card_an->execute(array($q));
		$kontrol_an = $card_an->fetch(PDO::FETCH_ASSOC);
		if ($kontrol_an > 0) {
			$sorgu = "SELECT * FROM tarayici_card_anime_users WHERE user_card_title LIKE '%$q%' LIMIT 1;";
			$sorgukontrol = $db->query($sorgu);
			while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
				echo '<span class="badge badge-primary card-header text-center"style="font-size: smaller">Nova Anime Wiki</span><div class="card-header">
                                <img src="' . $cikti['user_card_image'] . '" class="rounded-1 f-right mb-1 col-md img-fluid" style="max-width: 220px; max-height: 270px;"> 
                                <h1 class="fontlu">' . $cikti['user_card_title'] . '</h1>
                                <h5 class="text-muted fontlu">' . $cikti['user_card_muted'] . '</h5>
                                <br>
                                <p class="mx-1" style="max-width: 1010x;">' . $cikti['user_card_text'] . '...</p>
                                <a href="' . $cikti['user_card_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">' . $cikti['user_card_name'] . '</div>
                                </a>
                                
                            ';
				$link_anime = "SELECT * FROM tarayici_user_link";
				$link_kontrol = $db->query($link_anime);
				while($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)){
					if($cikti2['user_link_anime'] == $cikti['user_card_title']){
						echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
					}
				}echo '</div>';
			}
		}
	?>
</div>
<div class="col-md-12 text-center">
    <!--anime_ekle.php zorunlu kılınması-->
	<?php
		require 'Nova_Bots/anime_ekle.php';
		if(isset($_POST['s'])){
			echo '
                        <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                          <strong>Dikkat!</strong> Sayın kullanıcımız, Şikayet özelliği henüz kullanılmamaktadır. Anlayışınız için teşekkürler...
                          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>';
		}
	?>
</div>
<!--Web Sonuç-->
<div class="card col-md-7 f-left " style="background-color: #3c3c3c; margin-left: -3px; max-width: 760px;">
	<?php
		if(!isset($_GET['gorsel'])){
			echo '<script async src="https://cse.google.com/cse.js?cx=7fa903cdb7097786d"></script>
<div class="gcse-searchresults-only"></div>';
		}
	?>
<!--Nova Random Anime-->
	<?php

        for($b = 2; $b != 0; $b--){
			$card_anime = $db->prepare("SELECT tarayici_card_anime_users.user_card_title, tarayici_card_anime_users.user_card_muted, tarayici_card_anime_users.user_card_text, tarayici_card_anime_users.user_card_image, tarayici_card_anime_users.user_card_link, tarayici_card_anime_users.user_card_name, tarayici_card_anime_users.user_card_username tarayici_user_link.user_link_anime, tarayici_user_link.user_link_name, tarayici_user_link.user_link_link FROM tarayici_card_anime_users, tarayici_user_link WHERE tarayici_card_anime_users.user_card_title = tarayici_card_anime_users.user_card_name");
			$anime_sorgu = "SELECT * FROM tarayici_card_anime_users, tarayici_user_link ORDER BY RAND() LIMIT 1";
			$anime_sorgukontrol = $db->query($anime_sorgu);
			while ($cikti = $anime_sorgukontrol->fetch(PDO::FETCH_ASSOC)) {
				echo '</div><div class="card text-white f-right col-md-5 mb-2" style="background-color: #3c3c3c; margin-left: 0px;">
<span class="badge badge-warning card-header text-center"style="font-size: smaller">Random Animeler (Oluşturan Kullanıcı: ' . $cikti['user_card_username'] . ')</span>
                                        <div class="card-header">
                                       <img src="' . $cikti['user_card_image'] . '" class="rounded-1 f-right " style="max-width: 150px;"> 
                                       <h1 class="fontlu">' . $cikti['user_card_title'] . '</h1>
                                       <h5 class="text-muted fontlu">' . $cikti['user_card_muted'] . '</h5>
                                       <br>
                                       <p>' . $cikti['user_card_text'] . '...</p>
                                       <a href="' . $cikti['user_card_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">' . $cikti['user_card_name'] . '</div></a>';
				$link_anime = "SELECT * FROM tarayici_user_link";
				$link_kontrol = $db->query($link_anime);
				while($cikti2 = $link_kontrol->fetch(PDO::FETCH_ASSOC)){
					if($cikti2['user_link_anime'] == $cikti['user_card_title']){
						echo '<a href="' . $cikti2['user_link_link'] . '"><div class="btn btn-outline-white" style="border-radius: 100px; margin-left: 3px;" data-ripple-color="dark">' . $cikti2['user_link_name'] . '</div></a>';
					}
				}echo '</div><div class="row justify-content-center">
    <div class="btn-sm btn-outline-info mb-1 mt-1 text-center align-self-center mx-1" type="button" data-mdb-toggle="modal" data-mdb-target="#animeEkleModal" style="max-width: 260px;" data-ripple-color="dark">Sizde sitenizden link koymak istermisiniz?</div>
    <div class="btn-sm btn-outline-danger mb-1 mt-1 f-right text-center align-self-center mx-1" type="button" data-mdb-target="#animeSikayetModal" data-mdb-toggle="modal" style="max-width: 200px;" data-ripple-color="dark">Şikayetiniz mi var?</div>
</div>';
			}
        }


	?>
</div>


<!--Modallar-->

<div
        class="modal fade"
        id="animeSikayetModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Şikayet!</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="card-body">
					<?php
						if(isset($_SESSION['isim'])){
							echo '<div class="form-outline mb-3">
                                            <input name="s_isim" type="email" id="form12" class="form-control" disabled />
                                            <label class="form-label" for="form12">'.$_SESSION['isim'].'</label>
                                        </div>';
						}else{
							echo '<div class="form-outline mb-3">
                                            <input name="s_email" type="email" id="form12" class="form-control" required />
                                            <label class="form-label" for="form12">Email Adresiniz</label>
                                        </div>
                                        <div class="form-outline mb-3">
                                            <input name="s_isim" type="text" id="form12" class="form-control" required />
                                            <label class="form-label" for="form12">Adınız soyadınız</label>
                                        </div>';
						}
					?>
                    <div class="form-outline mb-3">
                        <input name="s_konu" type="text" id="form12" class="form-control" required />
                        <label class="form-label" for="form12">Şikayet Konusu</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input name="s_baslik" type="text" id="form12" class="form-control" required />
                        <label class="form-label" for="form12">Şikayet Başlık</label>
                    </div>
                    <div class="form-outline">
                        <textarea class="form-control" name="s_mesaj" id="textAreaExample" rows="4" required></textarea>
                        <label class="form-label" for="textAreaExample">Şikayet Mesajınız</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-info" type="sumbit" data-ripple-color="dark" name="s">Gönder!</button>
                    <button class="btn btn-outline-danger f-right" type="reset" data-ripple-color="dark">Reset!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div
        class="modal fade"
        id="animeEkleModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Anime ekle</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
			<?php
				if(isset($_SESSION['isim'])){
					echo '<div class="card-body">
        <ul class="nav nav-pills mb-3 justify-content-center" id="ex1" role="tablist">
                                          <li class="nav-item" role="presentation">
                                            <a
                                              class="nav-link active"
                                              id="ex1-tab-1"
                                              data-mdb-toggle="pill"
                                              href="#ex1-pills-6"
                                              role="tab"
                                              aria-controls="ex1-pills-1"
                                              aria-selected="true"
                                              >Anime Ekle</a
                                            >
                                          </li>
                                          <li class="nav-item" role="presentation">
                                            <a
                                              class="nav-link"
                                              id="ex1-tab-2"
                                              data-mdb-toggle="pill"
                                              href="#ex1-pills-7"
                                              role="tab"
                                              aria-controls="ex1-pills-2"
                                              aria-selected="false"
                                              >Varolan animeye link ekle</a
                                            >
                                          </li>
                                        </ul>
                                        
                                        <div class="tab-content" id="ex1-content">
                                          <div
                                            class="tab-pane fade show active"
                                            id="ex1-pills-6"
                                            role="tabpanel"
                                            aria-labelledby="ex1-tab-1"
                                          >
                                        <form method="post">
                                          <div class="row mb-4">
                                            <div class="col">
                                              <div class="form-outline">
                                                <input type="text" name="a_adi" id="form3Example1" class="form-control" required />
                                                <label class="form-label" for="form3Example1">Anime Adı</label>
                                              </div>
                                            </div>
                                            <div class="col">
                                              <div class="form-outline">
                                                <input type="text" id="form3Example2" name="a_site" class="form-control" required />
                                                <label class="form-label" for="form3Example2">Animenin yüklendiği site</label>
                                              </div>
                                            </div>
                                          </div>    
                                        
                                          <div class="form-outline mb-4">
                                            <input type="url" id="form3Example3" name="a_resim" class="form-control"required />
                                            <label class="form-label" for="form3Example3">Anime resim url</label>
                                          </div>
                                            <small class="text-muted">Max. 500 karakter</small>
                                          <div class="form-outline mb-4">
                                            <input type="text" id="form3Example4" maxlength="500" name="a_aciklama" class="form-control"required />
                                            <label class="form-label" for="form3Example4">Anime Açıklama</label>
                                          </div>
                                          <div class="form-outline mb-4">
                                            <input type="text" id="form3Example4" name="a_yas" class="form-control"required />
                                            <label class="form-label" for="form3Example4">Anime Yaş sınırı</label>
                                          </div>
                                          
                                          <div class="form-outline mb-4">
                                            <input type="url" id="form3Example4" name="a_link" class="form-control"required />
                                            <label class="form-label" for="form3Example4">Anime linki</label>
                                          </div>
                                           <button type="submit" name="a" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                            <button type="reset" class="btn btn-outline-danger" data-mdb-dismiss="modal">Reset</button><br>
                                            <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>
                                        </div>
                                     </form>
                                        
                          <div class="tab-pane fade" id="ex1-pills-7" role="tabpanel" aria-labelledby="ex1-tab-2">
                             <form method="post">
                                    <div class="form-outline mb-4">
                                    <input type="text" name="l_name" list="anime_name" id="form5Example1" class="form-control"required />
                                    <label class="form-label" for="form5Example1">Anime Adı</label>
                                  </div><datalist id="anime_name" max-value="5">';
					$card_anime = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
					$anime_sorgu = "SELECT * FROM tarayici_card_anime_users ";
					$anime_sorgukontrol2 = $db->query($anime_sorgu);
					while ($cikti = $anime_sorgukontrol2->fetch(PDO::FETCH_ASSOC)) {
						echo '<option value="'.$cikti['user_card_title'].'">'.$cikti['user_card_title'].'</option>';
					}
					echo '</datalist>
                                                              <div class="form-outline mb-4">
                                                                <input type="text" name="l_site" id="form5Example1" class="form-control" required/>
                                                                <label class="form-label" for="form5Example1">Sitenizin Adı</label>
                                                              </div>
                                                              <div class="form-outline mb-4">
                                                                <input type="url" name="l_link" id="form5Example2" class="form-control" required/>
                                                                <label class="form-label" for="form5Example2">Anime Linki</label>
                                                              </div>
                                                             <button type="submit" name="l" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                                            <button type="reset" class="btn btn-outline-danger" data-mdb-dismiss="modal">Reset</button><br>
                                                            <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>         
                                                         </form>
                                                      </div>
                                    </div>';
				}elseif(!isset($_SESSION['isim'])){
					echo '<div class="card-body"><div class="alert alert-danger" role="alert">
                                          ANİME EKLEMENİZ İÇİN GİRİŞ YAPMANIZ GEREKMEKTEDİR! 
                                        </div><br>
                                    <div class="btn btn-outline-secondary align-self-center mb-2">Lütfen Ana Sayfadan Giriş Yapıp Tekrar Deneyiniz...</div>
                                    <div class="btn btn-outline-danger align-self-center" data-mdb-target="#animeSikayetModal" data-mdb-toggle="modal">Şikayetiniz mi var?</div></div>';
				}
			?>
        </div>
    </div>
</div>
<div
        class="modal fade"
        id="animeEkleModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Anime ekle</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
			<?php
				if(isset($_SESSION['isim'])){
					echo '<div class="card-body">
        <ul class="nav nav-pills mb-3 justify-content-center" id="ex1" role="tablist">
                                          <li class="nav-item" role="presentation">
                                            <a
                                              class="nav-link active"
                                              id="ex1-tab-1"
                                              data-mdb-toggle="pill"
                                              href="#ex1-pills-6"
                                              role="tab"
                                              aria-controls="ex1-pills-1"
                                              aria-selected="true"
                                              >Anime Ekle</a
                                            >
                                          </li>
                                          <li class="nav-item" role="presentation">
                                            <a
                                              class="nav-link"
                                              id="ex1-tab-2"
                                              data-mdb-toggle="pill"
                                              href="#ex1-pills-7"
                                              role="tab"
                                              aria-controls="ex1-pills-2"
                                              aria-selected="false"
                                              >Varolan animeye link ekle</a
                                            >
                                          </li>
                                        </ul>
                                        
                                        <div class="tab-content" id="ex1-content">
                                          <div
                                            class="tab-pane fade show active"
                                            id="ex1-pills-6"
                                            role="tabpanel"
                                            aria-labelledby="ex1-tab-1"
                                          >
                                        <form method="post">
                                          <div class="row mb-4">
                                            <div class="col">
                                              <div class="form-outline">
                                                <input type="text" name="a_adi" id="form3Example1" class="form-control" />
                                                <label class="form-label" for="form3Example1">Anime Adı</label>
                                              </div>
                                            </div>
                                            <div class="col">
                                              <div class="form-outline">
                                                <input type="text" id="form3Example2" name="a_site" class="form-control" />
                                                <label class="form-label" for="form3Example2">Animenin yüklendiği site</label>
                                              </div>
                                            </div>
                                          </div>
                                        
                                          <div class="form-outline mb-4">
                                            <input type="text" id="form3Example3" name="a_resim" class="form-control" />
                                            <label class="form-label" for="form3Example3">Anime resim url</label>
                                          </div>
                                            <small class="text-muted">Max. 500 karakter</small>
                                          <div class="form-outline mb-4">
                                            <input type="text" id="form3Example4" maxlength="500" name="a_aciklama" class="form-control" />
                                            <label class="form-label" for="form3Example4">Anime Açıklama</label>
                                          </div>
                                          <div class="form-outline mb-4">
                                            <input type="text" id="form3Example4" name="a_yas" class="form-control" />
                                            <label class="form-label" for="form3Example4">Anime Yaş sınırı</label>
                                          </div>
                                          
                                          <div class="form-outline mb-4">
                                            <input type="url" id="form3Example4" name="a_link" class="form-control" />
                                            <label class="form-label" for="form3Example4">Anime linki</label>
                                          </div>
                                           <button type="submit" name="a" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                            <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">Kapat</button><br>
                                            <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>
                                        </div>
                                     </form>
                                        
                          <div class="tab-pane fade" id="ex1-pills-7" role="tabpanel" aria-labelledby="ex1-tab-2">
                             <form method="post">
                                     <select class="form-select mb-4" name="l_name" aria-label="Default animeler">
                            <option selected disabled>Anime seçin</option>';
					$card_anime = $db->prepare("SELECT user_card_title, user_card_muted, user_card_text, user_card_image, user_card_link, user_card_name, user_card_username FROM tarayici_card_anime_users ");
					$anime_sorgu = "SELECT * FROM tarayici_card_anime_users LIMIT 6";
					$anime_sorgukontrol2 = $db->query($anime_sorgu);
					while ($cikti = $anime_sorgukontrol2->fetch(PDO::FETCH_ASSOC)) {
						echo '<option value="'.$cikti['user_card_title'].'">'.$cikti['user_card_title'].'</option>';
					}
					echo '</select>
                                  <div class="form-outline mb-4">
                                    <input type="text" name="l_site" id="form5Example1" class="form-control" />
                                    <label class="form-label" for="form5Example1">Sitenizin Adı</label>
                                  </div>
        
                                  <div class="form-outline mb-4">
                                    <input type="text" name="l_link" id="form5Example2" class="form-control" />
                                    <label class="form-label" for="form5Example2">Anime Linki</label>
                                  </div>
                                 <button type="submit" name="l" class="btn btn-outline-info f-left align-self-center" style="margin-right: 5px;">Ekle!</button>
                                <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">Kapat</button><br>
                                <small class="text-muted">Spam yapan hesaplar kapatılıcaktır!</small>         
                             </form>
                          </div>
                          </div>
                          </div>
        </div>';
				}elseif(!isset($_SESSION['isim'])){
					echo '<div class="card-body"><div class="alert alert-danger" role="alert">
                                          ANİME EKLEMENİZ İÇİN GİRİŞ YAPMANIZ GEREKMEKTEDİR!
                                        </div></div>';
				}
			?>
        </div>
    </div>
</div>

