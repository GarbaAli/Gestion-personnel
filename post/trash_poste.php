<?php
session_start();

require ('../is_connect.php');
extract($_GET);

if (!empty($ID_POSTE) and $ID_POSTE > 0) {
  require '../bd.php';

  $q = $bdd-> prepare('DELETE FROM poste WHERE ID_POSTE = ?');
  $q->execute(array($ID_POSTE));
  header('location: ../poste.php');
}

?>
