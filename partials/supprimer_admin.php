<?php
$ID_PERSONNEL=$_GET['ID_PERSONNEL'];

    require_once "bd.php";
    $ps=$bdd->prepare("DELETE FROM personnel WHERE ID_PERSONNEL=?");
    $params=array($ID_PERSONNEL);
    $ps->execute($params);
    header("location:admin.php");

?>