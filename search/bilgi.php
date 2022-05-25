<div class="row">
    <div class="col-md-7">
        <div class="card text-white" style="background-color: #3c3c3c">
            <script async src="https://cse.google.com/cse.js?cx=dc6619b984f0ccb91"></script>
            <div class="gcse-searchresults-only"></div>
        </div>
    </div>
    <div class="col-md-5">
		<?php
			$card_wiki = $db->prepare("SELECT card_baslik, card_muted, card_text, card_image FROM tarayici_card_wiki ");
			$card_wiki->execute(array($q));
			$kontrol = $card_wiki->fetch(PDO::FETCH_ASSOC);
			if ($kontrol > 0) {
				$sorgu = "SELECT * FROM tarayici_card_wiki WHERE card_baslik LIKE '%$q%' LIMIT 1;";
				$sorgukontrol = $db->query($sorgu);
				while ($cikti = $sorgukontrol->fetch(PDO::FETCH_ASSOC)){
					echo '<div class="card text-white mb-2" style="background-color: #3c3c3c;"><span class="card-header text-center badge badge-success" style="font-size: smaller">Nova Wiki</span><div class="card-header">
                                <img src="'.$cikti['card_image'].'" class="rounded-1 f-right" style="max-width: 200px; max-height: 220px;"> 
                                <h1 class="fontlu">'. $cikti['card_baslik'] .'</h1>
                                <h5 class="text-muted fontlu">'. $cikti['card_muted'] .'</h5>
                                <br>
                                <p style="max-width: 1010x;" class="mb-5 text-decoration-none anti_a">'. $cikti['card_text'] .'...</p>
                                <a href="'. $cikti['card_link'] .'"><div class="btn btn-outline-white" style="border-radius: 100px;" data-ripple-color="dark">'. $cikti['card_kaynak'] .'</div>
                                </a>';
					echo '</div></div>';
				}

			}else{
				echo '<div class="card-header">
                                <h1 class="text-center">Opps! bir hata meydana geldi!</h1>
                            </div>';
            }
		?>
		<?php
			$card_sozluk = $db->prepare("SELECT * FROM tarayici_sozluk ");
			$card_sozluk->execute(array($q));
			$card_sozluk_ck = $card_sozluk->fetch(PDO::FETCH_ASSOC);
			if($card_sozluk_ck > 0){
				$sozluk_sorgu = "SELECT * FROM tarayici_sozluk WHERE sozluk_baslik LIKE '%$q%' LIMIT 5";
				$sozluk_kontrol = $db->query($sozluk_sorgu);
				while($cikti = $sozluk_kontrol->fetch(PDO::FETCH_ASSOC)){
					echo '<div class="card text-white" style="background-color: #3c3c3c;"><span class="badge badge-info card-header" >Nova Sözlük</span><div class="card-header text-center fontlu"><h3>'.$cikti['sozluk_baslik'].'</h3></div>
                                  <div class="card-body fontlu">'.$cikti['sozluk_aciklama'].'</div></div>';

				}
			}
		?>
        <?php
			if($sorgukontrol->rowCount() < 1 AND $sozluk_kontrol->rowCount() < 1){
				echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
                  <strong>'.$q.'</strong> Hakkında bir bilgi veya wiki bulunamadı <a data-mdb-target="#bilgiModal" href="#" data-mdb-toggle="modal">İlk siz ekleyin!</a>
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <div class="modal fade" id="bilgiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>';
                      if(isset($_SESSION['isim'])){
						  echo '<div class="modal-body">
                      <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a
                              class="nav-link active"
                              id="tab-sozluk"
                              data-mdb-toggle="pill"
                              href="#pills-sozluk"
                              role="tab"
                              aria-controls="pills-sozluk"
                              aria-selected="true"
								  >Sözlük</a
						  >
                          </li>
                          <li class="nav-item" role="presentation">
                            <a
                              class="nav-link"
                              id="tab-wiki"
                              data-mdb-toggle="pill"
                              href="#pills-wiki"
                              role="tab"
                              aria-controls="pills-wiki"
                              aria-selected="false"
								  >Wiki</a
						  >
                          </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-sozluk" role="tabpanel" aria-labelledby="tab-sozluk">
                                <form method="post">
                                  <div class="form-outline mb-4">
                                    <input type="text" name="ks_b" id="form4Example1" class="form-control" required />
                                    <label class="form-label" for="form4Example1">Sozluk başlık</label>
                                  </div>
                                
                                  <div class="form-outline mb-4">
                                    <textarea class="form-control" name="ks_t" id="form4Example3" rows="4" required></textarea>
                                    <label class="form-label" for="form4Example3">Sözlük açıklama</label>
                                  </div>
                                
                                  <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" required />
                                    <label class="form-check-label" for="form4Example4">
						  Eğer spam yaparsam hesabımın kapatılıcağını onaylıyorum
						  </label>
                                  </div>
                                
                                  <button type="submit" name="ks" class="btn btn-outline-info btn-block mb-4">Gönder</button>
                                </form>
                            </div>
                            <div class="tab-pane fade show" id="pills-wiki" role="tabpanel" aria-labelledby="tab-wiki">
                            <form method="post">
                                  <div class="form-outline mb-4">
                                    <input type="text" name="kw_b" id="form4Example1" class="form-control" required />
                                    <label class="form-label" for="form4Example1">Wiki Başlık</label>
                                  </div>
                                  
                                  <div class="form-outline mb-4">
                                    <input type="text" name="kw_m" id="form4Example1" class="form-control" required />
                                    <label class="form-label" for="form4Example1">Wiki Başlık Muted</label>
                                  </div>
                                  
                                  <div class="form-outline mb-4">
                                    <input type="url" name="kw_i" id="form4Example1" class="form-control" required />
                                    <label class="form-label" for="form4Example1">Wiki resim</label>
                                  </div>
                                  
                                  <div class="form-outline mb-4">
                                    <input type="text" name="kw_ka" id="form4Example1" class="form-control" required />
                                    <label class="form-label" for="form4Example1">Wiki Kaynak Adı</label>
                                  </div>
                                  
                                  <div class="form-outline mb-4">
                                    <input type="url" name="kw_kl" id="form4Example1" class="form-control" required />
                                    <label class="form-label" for="form4Example1">Wiki Kaynak Link</label>
                                  </div>
                                
                                  <div class="form-outline mb-4">
                                    <textarea class="form-control" name="kw_t" id="form4Example3" rows="4" required></textarea>
                                    <label class="form-label" for="form4Example3"> açıklama</label>
                                  </div>
                                
                                  <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" required />
                                    <label class="form-check-label" for="form4Example4">
						  Eğer spam yaparsam hesabımın kapatılıcağını onaylıyorum
						  </label>
                                  </div>
                                
                                  <button type="submit" name="kw" class="btn btn-outline-info btn-block mb-4">Gönder</button>
                                </form>
                            </div> 
                        </div>
                        </div> ';
                      } elseif(!isset($_SESSION['isim'])){

                          echo '<div class="modal-body"><div class="alert alert-danger">Lütfen eklemek için önce giriş yapınız!</div> </div>';

						  }

                    echo '</div>
                  </div>
                </div>
                
                
                ';
			}
        ?>
        <?php
            require 'Nova_Bots/wiki-sozluk.php';
        ?>
    </div>


