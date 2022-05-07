<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loli Search Bot Control</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <style>
        .fontlu{
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>
<body style="background: #333333">

<div class="container">
    <div class="mb-5"></div>
    <div class="row">
            <div class="card text-white col-md-5 mx-1" style="background: #3c3c3c">
                <div class="card-header fontlu text-center"><h5>Wikipedia</h5></div>
                <form method="post">
                    <div class="card-body">
                        <div class="alert alert-warning">Lütfen Mobile sitesinden linki yapıştırınız örn: <code>https://tr.<b>m</b>.wikipedia.org/wiki/Vitoria_Muharebesi</code></div>
                        <input type="url" class="form-control mb-3" name="w_link" placeholder="Wikipedia Mobile Linki yapıştırın" required>
                        <input type="url" class="form-control" name="w_image" placeholder="Konuyla alakalı Resim" >
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success" type="submit" name="wikipedia">Gönder!</button>
                        <button class="btn btn-outline-danger f-right" type="reset">Reset!</button>
                    </div>
                </form>
            </div>
            <div class="card text-white col-md-5" style="background: #3c3c3c">
                <div class="card-header fontlu text-center"><h5>Sözlük</h5></div>
                <form method="post">
                    <div class="card-body">
                        <div class="alert alert-warning">SesliSözlük'den Linki yapıştırınız örn: <code>https://www.seslisozluk.net/deneme-nedir-ne-demek/</code></div>
                        <input type="url" class="form-control" name="s_link" placeholder="TürkAnimeden link yapıştırınız">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success" name="sozluk">Gönder!</button>
                        <button type="reset" class="btn btn-outline-danger f-right">Reset!</button>
                    </div>
                </form>

            </div>
    </div>
    <?php
    require 'LoliBots/Loli_Wiki_Bots.php';
    ?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/mdb.min.js"></script>
<script>
    function realtime() {
        let time = moment().format('h:mm:ss a');
        document.getElementById('time').innerHTML = time;

        setInterval(() => {
            time = moment().format('h:mm:ss a');
            document.getElementById('time').innerHTML = time;
        }, 1000)
    }
    realtime();
</script>
</body>
</html>