<?php
session_start();
require_once("./inc/functions.php");
include('./inc/header.php');

$order = "title";
if (!empty($_GET['order'])) {
    $order = $_GET['order'];
}
$vinyles = selectAllVinyles($order);
//var_dump($vinyles);
// die();

?>

<div id="slider"></div>
<div id="submenu">
    <label for="order">Trier les vinyles</label>
    <select name="order" id="order">
        <option value="title" <?php if ($order === "title") {
                                    echo "selected";
                                } ?>>Titre</option>
        <option value="artiste" <?php if ($order === "artiste") {
                                    echo "selected";
                                } ?>>Artistes</option>
        <option value="genre" <?php if ($order === "genre") {
                                    echo "selected";
                                } ?>>Genre</option>
    </select>
</div>
<section id='article'>
    <?php
    for ($i = 0; $i < count($vinyles); $i++) {

        /*  racourcis pour inserer du code php dans html
            <?= $title ?>
            <?php echo $title; ?>
        */
    ?>


        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./assets/cover/<?= $vinyles[$i]['cover_img'] ?>" alt="<?= $vinyles[$i]['title'] . " - " . $vinyles[$i]['artiste'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $vinyles[$i]['title'] ?></h5>
                <p class="card-text"><?= $vinyles[$i]['artiste'] ?></p>
                <p class="card-text"><?= $vinyles[$i]['genre'] ?></p>


                <a href="single.php?id=<?= $vinyles[$i]['id'] ?>" class="btn btn-primary">Ecoutez le morceau</a>
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
<script src="./assets/js/order.js"></script>