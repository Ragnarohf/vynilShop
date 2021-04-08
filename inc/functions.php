<?php
require_once("./inc/pdo.php");

function selectAllVinyles($order)
{
    global $pdo;
    //$order servira a laisser le choix du classement pour mes users
    $rq = " SELECT * from vinyles order by :order";
    $query = $pdo->prepare($rq);
    $query->bindValue(':order', $order, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
