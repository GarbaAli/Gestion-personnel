<?php


function set_flash($message,$color,$taille = '50'){

$_SESSION['notification']['message'] = $message;
$_SESSION['notification']['color'] = $color;
$_SESSION['notification']['taille'] = $taille;
}

function message_flash($message,$color,$taille = '50'){

  return '<div class="alert alert-'.$color.'" style="height: '.$taille.'px ;">
              <button type="button" style="float: right;" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p style="float: left;">  '.$message.'  </p>
          </div>
';
}

// Recupere tous un personnel
function personnel($id_personnel){
  require ('bd.php');
  $req = $bdd->prepare('SELECT * FROM Personnel WHERE ID_PERSONNEL = ?');
  $req->execute(array($id_personnel));
  $req = $req->fetch();

  return $req;
}

// Recupere le prenom de l'user
function prenom($personnel){
  require ('bd.php');
  $req = $bdd->prepare('SELECT PRENOM FROM personnel WHERE ID_PERSONNEL = ? ');
  $req->execute(array($personnel));
  $req = $req->fetch();
  return $req['PRENOM'];
}

//PARSER LES DATES EN FRANCAIS
function parse_date($var){
   list($date,$time) = explode(" ", $var);
   list($year,$month,$day) = explode("-", $date);
   list($hour,$min,$sec) = explode(":", $time);

   $months = array("janv.","Fev.","mars","avril","mai","juin","juil","aout","sept.","oct.","nov.","dec.");
   $dte = "le $day".$months[$month-1]." $year a ${hour}h ${min}m ${sec}s";

return $dte;

}

// Recupere tous les postes
function All_poste(){
  require ('bd.php');
  $req = $bdd->prepare('SELECT * FROM poste ');
  $req->execute();
  return $req;
}

// Recupere tous les postes
function All_document(){
  require ('bd.php');
  $req = $bdd->prepare('SELECT * FROM fichier ');
  $req->execute();
  return $req;
}

// Recupere tous les postes
function All_personnel(){
  require ('bd.php');
  $req = $bdd->prepare('SELECT * FROM Personnel ');
  $req->execute();
  return $req;
}

// Recupere tous les postes
function user_admin(){
  require ('bd.php');
  $req = $bdd->prepare("SELECT * FROM Personnel WHERE ROLE = 'admin' OR ROLE = 'utilisateur' ");
  $req->execute();
  return $req;
}

// Recupere le poste en fonction de l'id
function get_poste($id_poste){
  require ('bd.php');
  $req = $bdd->prepare('SELECT NOM_POSTE FROM Poste WHERE ID_POSTE = ? ');
  $req->execute(array($id_poste));
  $req = $req->fetch();
  return $req['NOM_POSTE'];
}

function get_user($id_pers){
  require ('bd.php');
  $req = $bdd->prepare('SELECT PRENOM FROM personnel WHERE ID_PERSONNEL = ? ');
  $req->execute(array($id_pers));
  $req = $req->fetch();
  return $req['PRENOM'];
}

// Recupere tous les postes
function nbre_poste(){
  require ('bd.php');
  $req = $bdd->prepare('SELECT * FROM poste ');
  $req->execute();
  return $req->rowcount();
}

// Recupere tous les documents
function nbre_doc(){
  require ('bd.php');
  $req = $bdd->prepare('SELECT * FROM fichier ');
  $req->execute();
  return $req->rowcount();
}

// Recupere tous les postes
function nbre_personnel(){
  require ('bd.php');
  $req = $bdd->prepare('SELECT * FROM Personnel ');
  $req->execute();
  return $req->rowcount();
}

// Recupere tous les admin
function nbre_admin(){
  require ('bd.php');
  $req = $bdd->prepare("SELECT * FROM Personnel WHERE ROLE = 'utilisateur' OR ROLE = 'admin'  ");
  $req->execute();
  return $req->rowcount();
}

?>
