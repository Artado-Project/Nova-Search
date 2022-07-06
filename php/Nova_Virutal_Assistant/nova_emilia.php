<div class="f-right">
    <img class="img-fluid rounded-circle" data-mdb-target="#emilia" data-mdb-toggle="modal" src="php/Nova_Virutal_Assistant/emilia.jpg" style="max-width: 50px;">
</div>


<div class="modal fade" id="emilia" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post">
                <div class="card-header fontlu">
                    <b>Emilia - Sanal Assistan</b>
                    <button type="button" class="btn-close f-right" data-mdb-dismiss="modal" aria-label="Close"></button><br>
                </div>
                <div class="modal-body">
                    <div id="emilia-text"></div>
                    <div id="emilia-user"></div>
                </div>
                <div class="modal-footer">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="emilia-input" id="emilia-input" onclick="post();" placeholder="Emilia'ya mesaj yaz!" aria-label="Emilia'ya mesaj yaz!">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="emilia">Gönder!</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>