<?php
session_start();
  require '../is_connect.php';
require ('../function.php');
require '../bd.php';
  extract($_GET);
  $id = $ID_PERSONNEL;
  if (!empty($id) and $id > 0 and intval($id)) {
    $q = $bdd->prepare('SELECT * FROM Personnel WHERE ID_PERSONNEL = ?');
    $q->execute(array($id));
    $pers = $q->fetch();
    $mdp = '';
    $role = '';


        $req = $bdd->prepare("UPDATE `personnel` SET `mdp` = :mdp , `ROLE` = :role WHERE `personnel`.`ID_PERSONNEL` = :id");
        $req->execute([
          'mdp'=>$mdp,
          'role'=>$role,
          'id'=> $id
        ]);

        header('location:../admin.php');
        set_flash('Cet Admin a perdu ses droits','success');
}else {
    header('location:../admin.php');
}
 ?>
