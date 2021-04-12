<?php
require_once("./inc/pdo.php");
// function requetes MySQl
function selectAllVinyles($order)
{
    global $pdo;
    //$order servira a laisser le choix du classement pour mes users
    $rq = " SELECT * from vinyles order by $order";
    $query = $pdo->prepare($rq);
    // $query->bindValue(':order', $order, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function selectVinyleById($id)
{
    global $pdo;
    // var_dump($id);
    $rq = "SELECT * from vinyles where id =:id";
    $query = $pdo->prepare($rq);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();
    return $result;
}
// functions courantes 
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


function verifNum($input, $nb, $txtErreur)
{
    $chaine = $input;
    $patern = "@[0-9]{$nb}@";
    if (!preg_match($patern, $chaine)) {
        $erreur[$input] = $txtErreur;
    }
}
