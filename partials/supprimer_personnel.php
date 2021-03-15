<?php
session_start();
require '../function.php';
extract($_GET);

    require "../bd.php";
    $ps=$bdd->prepare("DELETE FROM personnel WHERE ID_PERSONNEL = ?");
    $params=array($ID_PERSONNEL);
    $ps->execute($params);
    header("location:../tables.php");

    set_flash('Personnel Supprimé','success',50);
?>
