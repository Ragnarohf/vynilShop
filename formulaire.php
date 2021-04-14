<?php
session_start();
require_once("./inc/functions.php");
//protection contre un acces direct via l'url 
protectUrl('role_admin');


include('./inc/header.php');
$erreur = [];
if (!empty($_GET)) {
    var_dump(unserialize(($_GET['er'])));
    $erreur = unserialize($_GET['er']);
} ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulaire</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- form>(input*5+select>(option)) -->
    <div id="formmp3">
        <h1>Uploadez vos mp3</h1>
        <form class="formulaire" action="./validator.php" method="POST" enctype="multipart/form-data" name="uploadMP3">
            <label for="mp3">MP3</label>
            <input type="file" name="mp3" id="mp3">
            <?php // detectt if $erreur['mp3'] est vide ou pas
            //sinon afficher cette erreur en rouge
            if (array_key_exists('mp3', $erreur)) {
                echo "<div class='error'>" . $erreur['mp3'] . "</div>";
            }
            ?>
            <label for="coverImg">Cover</label>
            <input type="file" name="coverImg" id="coverImg">
            <?php // detectt if $erreur['mp3'] est vide ou pas
            //sinon afficher cette erreur en rouge
            if (array_key_exists('coverImg', $erreur)) {
                echo "<div class='error'>" . $erreur['coverImg'] . "</div>";
            }
            ?>
            <input type="text" name="title" placeholder="Titre" id="title">
            <?php // detectt if $erreur['mp3'] est vide ou pas
            //sinon afficher cette erreur en rouge
            if (array_key_exists('title', $erreur)) {
                echo "<div class='error'>" . $erreur['title'] . "</div>";
            }
            ?>
            <input type="text" name="artiste" placeholder="Artiste" id="artiste">
            <?php // detectt if $erreur['mp3'] est vide ou pas
            //sinon afficher cette erreur en rouge
            if (array_key_exists('artiste', $erreur)) {
                echo "<div class='error'>" . $erreur['artiste'] . "</div>";
            }
            ?>
            <input type="text" name="genre" placeholder="Genre" id="genre">
            <?php // detectt if $erreur['mp3'] est vide ou pas
            //sinon afficher cette erreur en rouge
            if (array_key_exists('genre', $erreur)) {
                echo "<div class='error'>" . $erreur['genre'] . "</div>";
            }
            ?>
            <select name="annee" id="annee">
                <option value="" disabled selected>Choisissez l'année</option>
                <?php
                $i = 1930;
                while ($i >= 1930 && $i <= 2021) {
                    echo "<option value='$i'>$i</option>";
                    $i++;
                }
                ?>
            </select>
            <textarea name="description" placeholder="Description" id="description"></textarea>
            <input type="submit" value="Envoyer" name="submit">
        </form>
    </div>

</body>
<?php
include('./inc/footer.php');
?>

</html>