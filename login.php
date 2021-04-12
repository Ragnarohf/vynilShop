<?php
session_start();
require_once("./inc/functions.php");
require_once("./inc/pdo.php"); // ne sert a rien deja appelé dans functions.php
include('./inc/header.php');
//je teste l'existance de données post 
if (!empty($_POST)) {
    $erreur = [];
    //si login et password ne sont pas vide 
    $_POST['login'] = verifInput("login", "vous n'avez pas remplie le champ login.");
    $_POST['pwd'] = verifInput("pwd", "vous n'avez pas remplie le champ pwd.");
    if (count($erreur) === 0) {
        //demain
    }
}

?>
<div id="formmp3">
    <h1>Connectez</h1>
    <form class="formulaire" action="login.php" method="POST" name="registration">
        <input type="text" name="login" id="login" placeholder="Login">
        <div class="error"></div>
        <!-- Bonus show hide password jQuery 
        https://codepen.io/Sohail05/pen/yOpeBm -->
        <input type="text" name="pwd" id="pwd" placeholder="Mot de passe ">
        <div class="error"></div>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    include('./inc/footer.php');
    ?>