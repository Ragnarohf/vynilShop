<?php
// pour executer des requetes mysql j'ai besoin dans ce fichier d'appeler ma conexion a la bdd
require_once('pdo.php');
// phpinfo();permet de connaitre les spec dus erveur ex:taille maximal des fichiers uploadés
//$_FILES permet de stocker les fichiers uploadés (input type="files)
$erreur = [];


if (!empty($_POST)) {

    var_dump($_FILES);
    // $_POST permet de stocker toutes les autres fpormes de données envoyées par un formulaire (method="post")
    var_dump($_POST); //supergblobales
    //echo $_POST["title"];

    //Gestion donnée du POST


    function verifInput($input, $txtErreur)
    {   // pour poiuvoir utiliser mon tableau d'erreur a l'interieur de ma fonction
        // je le déclare en global 
        global $erreur;
        // strlen me permet de verifier que ma chaine $input (string)
        //contient bien au moins 1 caractere
        if (strlen($_POST[$input]) > 0) {
            //trim() supprime tous les caracteres invisible 
            return  trim(strip_tags($_POST[$input]));
        } else {
            //j'ajoute une nouvelle erreur a mon tableau en cas de champs vide 
            $erreur[$input] = $txtErreur;
            //array_push($erreur,$input $txtErreur);
        }
    }
    $title = verifInput("title", "le champ titre est vide");
    $artiste = verifInput("artiste", "le champ artiste est vide");
    $genre = verifInput("genre",  "le champ genre est vide");
    // is_int() me permet de determiner si ma var est bien de type int
    if (!empty($_POST["annee"])) {
        $annee = trim(strip_tags($_POST["annee"]));
        $annee = intval($annee);
        var_dump($annee);
    }
    if (!empty($_POST["description"])) {
        $description = trim(strip_tags($_POST["description"]));
    }

    // Gestion des données FILES
    // audio
    if ($_FILES['mp3']["size"] > 0 && $_FILES['mp3']["error"] === 0) {
        if ($_FILES["mp3"]['type'] === "audio/mpeg") {
            $mp3 = $_FILES["mp3"]['tmp_name'];
        } else {
            $erreur['mp3'] = "le fichier mp3 n'est pas au bon format";
        }
    } else {
        $erreur['mp3'] = "le champ mp3 est vide";
    }

    //image
    if ($_FILES['coverImg']["size"] > 0 && $_FILES['coverImg']["error"] === 0) {
        if ($_FILES["coverImg"]['type'] === "image/jpeg") {
            $coverImg = $_FILES["coverImg"]['tmp_name'];
        } else {
            $erreur['coverImg'] = "le fichier coverImg n'est pas au bon format";
        }
    } else {
        $erreur['coverImg'] = "le champ cover est vide";
    }
    var_dump($erreur);

    //je vérifie que mon tableau d'erreur soit vide 
    if (count($erreur) === 0) {
        $mp3Name = $_FILES['mp3']['name'];
        $coverImg = $_FILES['coverImg']['name'];
        var_dump("mp3:", $mp3Name);
        //insertion en base
        $rq = "SELECT id FROM vinyles WHERE mp3 = :mp3Name";
        $query = $pdo->prepare($rq);
        $query->bindValue(':mp3Name', $mp3Name, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        if (!$result) {
            $rq = "INSERT INTO vinyles(mp3,cover_img,title, artiste,genre, annee,description )
            VALUES (:mp3Name, :coverImg,:title, :artiste, :genre,:annee,:description)";
            $query = $pdo->prepare($rq);
            $query->bindValue(':mp3Name', $mp3Name, PDO::PARAM_STR);
            $query->bindValue(':coverImg', $coverImg, PDO::PARAM_STR);
            $query->bindValue(':title', $title, PDO::PARAM_STR);
            $query->bindValue(':artiste', $artiste, PDO::PARAM_STR);
            $query->bindValue(':genre', $genre, PDO::PARAM_STR);
            $query->bindValue(':annee', $annee, PDO::PARAM_INT);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            $query->execute();
            //j'upload mes fichiers
            var_dump($mp3);
            move_uploaded_file($mp3, "../assets/audio/" . $_FILES["mp3"]["name"]);
            move_uploaded_file($coverImg, "../assets/cover/" . $_FILES["coverImg"]["name"]);
        } else {
            $erreur['mp3'] = "Ce morceau exite deja";

            //erreur utilisateur
            $erreur = serialize($erreur);
            header("Location:../formulaire.php?er=$erreur");
        };
    }
    //erreur utilisateur

    $erreur = serialize($erreur);
    header("Location:../formulaire.php?er=$erreur");
}