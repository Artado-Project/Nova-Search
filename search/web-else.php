<?php
    require 'Nova_Bots/+18_onlem.php';
    require 'modules/wiki.php';
    require 'modules/anime-hanime_wiki.php';
    require 'modules/dictionary.php';
    require 'modules/news.php';
?>

<div class="card col-md-7 f-left" style="background-color: #3c3c3c; margin-left: -3px; max-width: 760px;">
    <?php
    if(!isset($_GET['gorsel'])){
        echo '<script async src="https://cse.google.com/cse.js?cx=f14e0d02fc65ebd77"></script>
                        <div class="gcse-searchresults-only"></div>';
    }
    ?>
</div>

<?php
    require 'modules/rand_sys.php'; 
    require 'modules/lastes_wiki.php'; 
 ?>

