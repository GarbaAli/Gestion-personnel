<?php
session_start();
$ID_FICHIER=$_GET['ID_FICHIER'];
require '../function.php';
    require_once "../bd.php";
    $ps=$bdd->prepare("DELETE FROM fichier WHERE ID_FICHIER = ?");
    $params=array($ID_FICHIER);
    $ps->execute($params);
    header("location:../document.php");
      set_flash('Document Supprimé avec success','success',50);

?>
