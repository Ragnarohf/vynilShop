<?php
require_once("./inc/functions.php");
if (!empty($_GET)) {
    $id = intval($_GET['id']);
    $vinyle = selectVinyleById($id);
} else {
    header("Location:index.php");
}
include('./inc/header.php');
?>
<div class="jumbotron">
    <img src="./assets/cover/<?= $vinyle['cover_img'] ?>" alt="" class='img-fluid'>
    <h1 class="display-4"><?= $vinyle['title'] ?></h1>
    <p class="lead"><?= $vinyle['artiste'] ?></p>
    <p class="lead muted"><?= $vinyle['genre'] ?></p>
    <p class="lead "><?= $vinyle['annee'] ?></p>



    <p class="lead muted"><?= $vinyle['description'] ?></p>
    </p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Mettre dans le panier</a>
    </p>
</div>
<div id="player">

</div>
<?php
include('./inc/footer.php');
?>
<script src="./assets/js/player.js"></script>