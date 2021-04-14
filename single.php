<?php
session_start();
//protection contre un acces direct via l'url 
require_once("./inc/functions.php");
protectUrl('role_user');

if (!empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $vinyle = selectVinyleById($id);
} else {
    header("Location:index.php");
}
include('./inc/header.php');
?>
<section id="single">

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
    <script>
        // tableau d'informations pour chaque fichier audio
        const tbPlaylist = [{
            mp3: "<?= $vinyle['mp3'] ?>",
            cover: "<?= $vinyle['cover_img'] ?>",
            title: "<?= $vinyle['title'] ?>",
            artiste: "<?= $vinyle['artiste'] ?>",
            genre: "<?= $vinyle['genre'] ?>",
            annee: "<?= $vinyle['annee'] ?>",
            desc: "<?= $vinyle['description'] ?>"
        }];
    </script>
    <?php
    include("./inc/lecteur.php") ?>
</section>

<?php
include('./inc/footer.php');
?>
<script src="./assets/js/player.js"></script>