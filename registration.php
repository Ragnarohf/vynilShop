<?php
require_once("./inc/functions.php");
require_once("./inc/pdo.php"); // ne sert a rien deja appelé dans functions.php
include('./inc/header.php');
//je teste l'existance de données post 
if (!empty($_POST)) {
    $erreur = [];
    // autre methode pour traiter mes entrés
    // for ($i = 0; $i < count($_POST); $i++) {
    //     $_POST[$i] = verifInput("nom", "vous n'avez pas remplie le champ nom.");
    // }
    $_POST['nom'] = verifInput("nom", "vous n'avez pas remplie le champ nom.");
    $_POST['prenom'] = verifInput("prenom", "vous n'avez pas remplie le champ prenom.");
    $_POST['login'] = verifInput("login", "vous n'avez pas remplie le champ login.");
    $_POST['pwd'] = verifInput("pwd", "vous n'avez pas remplie le champ pwd.");
    $_POST['pwd2'] = verifInput("pwd2", "vous n'avez pas remplie le champ pwd2.");
    if ($_POST['pwd'] !== $_POST['pwd2']) {
        $erreur['pwd2'] = "les 2 passwords ne sont pas identiques";
    }
    $_POST['email'] = verifInput("email", "vous n'avez pas remplie le champ email.");
    // filter_var ???
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erreur["email"] = "l'adresse email n'est pas validé";
    }
    $_POST['addr1'] = verifInput("addr1", "vous n'avez pas remplie le champ addr1.");
    $_POST['addr2'] = trim(strip_tags($_POST["addr2"]));
    $_POST['cp'] = verifNum("cp", '5', "le code postal n'est pas valide");
    var_dump($_POST['cp']);
    $_POST['tel'] = verifNum("tel", '10', "le numero de tel n'est pas valide");
    var_dump($_POST['tel']);
    $_POST['ville'] = verifInput("ville", "vous n'avez pas remplie le champ ville.");


    var_dump($erreur);
    if (count($erreur) === 0) {
        $hashPwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
        $_POST['pwd'] = password_hash($hashPwd, PASSWORD_ARGON2I);
        insertUser($_POST);
    }
};
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
        <!-- Bonus show hide password jQuery 
        https://codepen.io/Sohail05/pen/yOpeBm -->
        <input type="text" name="pwd" id="pwd" placeholder="Mot de passe ">
        <div class="error"></div>
        <input type="text" name="pwd2" id="pwd2" placeholder="Confirmez Mot de passe">
        <div class="error"></div>
        <input type="email" name="email" id="email" placeholder="Email">
        <div class="error"></div>
        <input type="text" name="tel" id="tel" placeholder="Téléphone">
        <div class="error"></div>
        <input type="text" name="addr1" id="addr1" placeholder="Adresse">
        <div class="error"></div>
        <input type="text" name="addr2" id="addr2" placeholder="Complement d'adresse">
        <div class="error"></div>
        <input type="text" name="cp" id="cp" placeholder="Code Postal">
        <div class="error"></div>
        <input type="text" name="ville" id="ville" placeholder="Ville">
        <div class="error"></div>
        <input type="submit" value="Envoyer">
    </form>
</div>
<?php
include('./inc/footer.php');
?>