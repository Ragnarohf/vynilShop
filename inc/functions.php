<?php
require_once("./inc/pdo.php");

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
    var_dump($id);
    $rq = "SELECT * from vinyles where id =:id";
    $query = $pdo->prepare($rq);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();
    return $result;
}
