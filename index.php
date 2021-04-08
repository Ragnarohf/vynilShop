<?php
require_once("./inc/functions.php");
include('./inc/header.php');
$vinyles = selectAllVinyles("title");
// var_dump($vinyles);
// die();

?>

<div id="slider"></div>
<section id='article'>
    <?php
    for ($i = 0; $i < count($vinyles); $i++) {
    ?>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./assets/cover/<?= $vinyles[$i]['cover_img'] ?>" alt="<?= $vinyles[$i]['title'] . " - " . $vinyles[$i]['artiste'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $vinyles[$i]['title'] ?></h5>
                <p class="card-text"><?= $vinyles[$i]['artiste'] ?></p>
                <p class="card-text"><?= $vinyles[$i]['genre'] ?></p>

                <a href="#" class="btn btn-primary">Plus d'infos...</a>
            </div>
        </div>
    <?php
    }
    ?>

</section>



<?php
include('./inc/footer.php');
?>
<script src="./assets/js/carouselMultiEffets.js"></script>