<?php

require '../bd.php';
sleep(1);


extract($_POST);
$error = '';
if (!empty($postes)) {
  $postes = trim(htmlentities($postes));

  $req = $bdd->prepare("INSERT INTO poste(NOM_POSTE) VALUES (?)");
  $req->execute(array($postes));
  $error = 'ok';

}else {
  $error = 'no';
}

$data = array(
  'error'=> $error
);

echo json_encode($data);

 ?>
