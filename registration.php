<?php
require_once("./inc/functions.php");

include('./inc/header.php');
?>
<!-- form>(input*11+select>(option)) -->
<div id="formmp3">
    <h1>Enregistrez-vous</h1>
    <form class="formulaire" action="registration.php" method="POST" name="registration">
        <input type="text" name="nom" id="nom" placeholder="Nom">
        <div class="error"></div>
        <input type="text" name="prenom" id="prenom" placeholder="Prenom">
        <div class="error"></div>
        <input type="text" name="login" id="login" placeholder="Login">
        <div class="error"></div>
        <input type="text" name="pwd" id="pwd" placeholder="Mot de passe ">
        <div class="error"></div>
        <input type="text" name="pwd2" id="pwd2" placeholder="Confirmez Mot de passe">
        <div class="error"></div>
        <input type="text" name="email" id="email" placeholder="Email">
        <div class="error"></div>
        <input type="text" name="tel" id="tel" placeholder="Téléphone">
        <div class="error"></div>
        <input type="text" name="addr1" id="addr1" placeholder="Adresse">
        <div class="error"></div>
        <input type="text" name="addr2" id="addr2" placeholder="Complement d'adresse">
        <div class="error"></div>
        <input type="text" name="cp" id="cp" placeholder="Code Postal">
        <div class="error"></div>
        <input type="text" name="Ville" id="Ville" placeholder="Ville">
        <div class="error"></div>
        <input type="submit" value="Envoyer">
    </form>
</div>
<?php
include('./inc/footer.php');
?>