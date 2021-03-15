<?php
$ID_POSTE=$_GET['ID_POSTE'];

    require_once "bd.php";
    $ps=$bdd->prepare("DELETE FROM poste WHERE ID_POSTE=?");
    $params=array($ID_POSTE);
    $ps->execute($params);
    header("location:poste.php");

?>