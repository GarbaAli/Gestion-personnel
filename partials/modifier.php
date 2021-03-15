<?php
session_start();
  require 'is_connect.php';
require ('function.php');

  $postes =  All_poste();

  $id_personnel = $_GET['ID_PERSONNEL'];
  $perso = personnel($id_personnel);


// traitement du formulaire declencher par le post du btn submit

if(isset($_POST['submit'])){

 function verifie($var){
     $var = trim($var);
     $var = htmlspecialchars($var);
        return $var;
    }

    extract($_POST);
    $mdp = '';
    $role = '';
    $nom = verifie($nom);
    $prenom = verifie($prenom);
    $ville = verifie($ville);
    $quartier = verifie($quartier);
    $matrimonial = verifie($matrimonial);
    $nb_enfant = verifie($nb_enfant);
    $orange = verifie($orange);
    $mtn = verifie($mtn);
    $numpro = verifie($numpro);
    $num_urgence = verifie($num_urgence);
    $nom_urgence = verifie($nom_urgence);
    $lien = verifie($lien);
    $pointure = verifie($pointure);
    $fr = verifie($fr);
    $ang = verifie($ang);
    $langue = verifie($langue);
    $poste = verifie($poste);
    $error = '';

    if (empty($nom)) {
        $error .= 'Le champ nom est requis.';
    }
    if (empty($prenom)) {
        $error .= 'Le champ prenom est requis.';
    }
    if (empty($ville)) {
        $error .= 'Le champ Ville est requis.';
    }
    if (empty($quartier)) {
        $error .= 'Le champ quartier est requis.';
    }
    if (empty($matrimonial)) {
        $error .= 'Le regime matrimonial est obligatoire.';
    }
    if (empty($num_urgence)) {
        $error .= 'Remplir le numero d urgence.';
    }
    if (empty($nom_urgence)) {
        $error .= 'donner le nom de le personne a appeller en cas durgence.';
    }
    if (empty($lien)) {
        $error .= 'Le champ lien est requis.';
    }
    if (empty($fr)) {
        $error .= 'pour le francais, faite un choix.';
    }
    if (empty($ang)) {
        $error .= 'pour Anglais, faite un choix .';
    }

    $cni = htmlentities($_FILES['cni']['name']);
    $contrat = htmlentities($_FILES['contrat']['name']);
    $permis = htmlentities($_FILES['permis']['name']);
    $cv = htmlentities($_FILES['cv']['name']);
    $localisation = htmlentities($_FILES['localisation']['name']);

    if (!empty($cni)) {
      $cni_size = $_FILES['cni']['size'];
      $cni_temp = $_FILES['cni']['tmp_name'];
      $tailleMax = 2097152;
      $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG');
      if ($cni_size <= $tailleMax){
          $extensionUplaod = strtolower(substr(strrchr($cni, '.'), 1));
          if (!file_exists('personnels/'.$prenom)) {
            mkdir('personnels/'.$prenom , 0755);
          }
          if (in_array($extensionUplaod, $extensionValide)){
              move_uploaded_file($cni_temp,'personnels/'.$prenom.'/'.$cni);
          }else{
              $error .= 'La cni doit etre au format suivant (GIF,JPG,JPEG,PNG) .';
          }
      }else{
            $error .= 'La taille du fichier cni doit etre superieur a 2 megas .';
      }
    }else {
      $error .= 'Le fichier de la cni est requis';
    }

// contrat
    if (!empty($contrat)) {
      $contrat_size = $_FILES['contrat']['size'];
      $contrat_temp = $_FILES['contrat']['tmp_name'];
      $tailleMax = 2097152;
      $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG');
      if ($contrat_size <= $tailleMax){
          $extensionUplaod = strtolower(substr(strrchr($contrat, '.'), 1));
          if (!file_exists('personnels/'.$prenom)) {
            mkdir('personnels/'.$prenom , 0755);
          }
          if (in_array($extensionUplaod, $extensionValide)){
              move_uploaded_file($contrat_temp,'personnels/'.$prenom.'/'.$contrat);
          }else{
              $error .= 'Le contrat doit etre au format suivant (GIF,JPG,JPEG,PNG) .';
          }
      }else{
            $error .= 'La taille du fichier contrat doit etre superieur a 2 megas .';
      }
    }else {
      $error .= 'Le fichier du contrat est requis';
    }

// permis
    if (!empty($permis)) {
      $permis_size = $_FILES['permis']['size'];
      $permis_temp = $_FILES['permis']['tmp_name'];
      $tailleMax = 2097152;
      $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG');
      if ($permis_size <= $tailleMax){
          $extensionUplaod = strtolower(substr(strrchr($permis, '.'), 1));
          if (!file_exists('personnels/'.$prenom)) {
            mkdir('personnels/'.$prenom , 0755);
          }
          if (in_array($extensionUplaod, $extensionValide)){
              move_uploaded_file($permis_temp,'personnels/'.$prenom.'/'.$permis);
          }else{
              $error .= 'Le permis doit etre au format suivant (GIF,JPG,JPEG,PNG) .';
          }
      }else{
            $error .= 'La taille du fichier permis doit etre superieur a 2 megas .';
      }
    }else {
      $error .= 'Le fichier du permis est requis';
    }
    // cv
        if (!empty($cv)) {
          $cv_size = $_FILES['cv']['size'];
          $cv_temp = $_FILES['cv']['tmp_name'];
          $tailleMax = 2097152;
          $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG');
          if ($cv_size <= $tailleMax){
              $extensionUplaod = strtolower(substr(strrchr($cv, '.'), 1));
              if (!file_exists('personnels/'.$prenom)) {
                mkdir('personnels/'.$prenom , 0755);
              }
              if (in_array($extensionUplaod, $extensionValide)){
                  move_uploaded_file($cv_temp,'personnels/'.$prenom.'/'.$cv);
              }else{
                  $error .= 'Le cv doit etre au format suivant (GIF,JPG,JPEG,PNG) .';
              }
          }else{
                $error .= 'La taille du fichier cv doit etre superieur a 2 megas .';
          }
        }else {
          $error .= 'Le fichier du cv est requis';
        }

        // plan localisation
            if (!empty($localisation)) {
              $localisation_size = $_FILES['localisation']['size'];
              $localisation_temp = $_FILES['localisation']['tmp_name'];
              $tailleMax = 2097152;
              $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG');
              if ($localisation_size <= $tailleMax){
                  $extensionUplaod = strtolower(substr(strrchr($localisation, '.'), 1));
                  if (!file_exists('personnels/'.$prenom)) {
                    mkdir('personnels/'.$prenom , 0755);
                  }
                  if (in_array($extensionUplaod, $extensionValide)){
                      move_uploaded_file($localisation_temp,'personnels/'.$prenom.'/'.$localisation);
                  }else{
                      $error .= 'La localisation doit etre au format suivant (GIF,JPG,JPEG,PNG) .';
                  }
              }else{
                    $error .= 'La taille du fichier localisation doit etre superieur a 2 megas .';
              }
            }else {
              $error .= 'Le fichier de la localisation est requis';
            }

    if ($error == '') {

         $req = $bdd->prepare("INSERT INTO personnel(ID_POSTE,NOM,PRENOM,mdp,ORANGE,MTN,PHONE_PRO,CNI,VILLE_RESIDENCE,QUARTIER,CONTRAT,PERMIS_CONDUIRE,
         CONTACT_URGENT,NOM_URGENT,LIEN_PARENTER,PLAN_LOCALISATION,ETAT_MATRIMONIAL,NBRE_ENFANT,POINTURE,CV,FRANCAIS,ANGLAIS,AUTRE_LANGUE,ROLE);
         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
           $req->execute(array($poste,$nom,$prenom,$mdp,$orange,$mtn,$numpro,$cni,$ville,$quartier,$contrat,$permis,$num_urgence,$nom_urgence,
         $lien,$localisation,$matrimonial,$nb_enfant,$pointure,$cv,$fr,$ang,$langue,$role));

         header('location:tables.php');
    }
}


 ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2N-Nouveau Personnel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
       input{
        border-radius: 0px;
      }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Debut du menu  -->
      <?php require 'header.php'; ?>
      <!-- Fin du menu -->

                <!-- Begin Page Content -->
                <div class="container">
                  <form id="form_personnel" action="" method="post">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mise à jour du personnel [ <?php echo $perso['NOM'] ?> ]</h1>
                        <input type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" name="submit" value="Mise à jour">
                    </div>
                    <hr>

                    <!-- Contenue de la page -->

                        <div class="row">
                          <div class="col-12">
                            <?php if (isset($error)) {
                                foreach ($error as $e) {
                                  '<p style="color:red;font-size:15px">'.$e.'</p>';
                                }
                            } ?>
                          </div>
                          <div class="col-12">
                            <hr>
                            <em style="color:#000;font-size:20px;text-decoration:underline">Informations de base</em>
                          </div>
                          <div class="form-group col-5">
                            <div class="form-group">
                              <label for="nom">Nom <span style="color:red">*</span> </label>
                              <input style="border-radius:0px" value="<?php echo $perso['NOM'] ?>" type="text" id="nom" autocomplete="off" class="form-control" name="nom">
                            </div>
                          </div>
                          <div class="form-group col-5">
                            <label for="prenom">Prenom : <span style="color:red">*</span> </label>
                            <input type="text" value="<?php echo $perso['PRENOM'] ?>" id="prenom" autocomplete="off" class="form-control" name="prenom">
                          </div>
                          <div class="form-group col-5">
                            <label>Ville de residence : <span style="color:red">*</span> </label>
                            <input type="text" id="ville" value="<?php echo $perso['VILLE_RESIDENCE'] ?>" autocomplete="off" class="form-control" name="ville">
                          </div>
                          <div class="form-group col-5">
                            <label>Quartier : <span style="color:red">*</span> </label>
                            <input type="text" id="quartier" value="<?php echo $perso['QUARTIER'] ?>" autocomplete="off" class="form-control" name="quartier">
                          </div>
                          <div class="form-group col-5">
                            <label>carte national d'identite : <span style="color:red">*</span> </label>
                            <input type="file" id="cni" value="<?php echo $perso['CNI'] ?>" class="form-control-file" name="cni">
                          </div>
                          <div class="form-group col-5">
                            <label>Etat Matrimonial : <span style="color:red">*</span> </label>
                            <input type="text" id="matrimonial" value="<?php echo $perso['ETAT_MATRIMONIAL'] ?>" autocomplete="off" class="form-control" name="matrimonial">
                          </div>
                          <div class="form-group col-5">
                            <label>Nombre d'enfant : <span style="color:red">*</span> </label>
                            <input type="text" id="ville" value="<?php echo $perso['NBRE_ENFANT'] ?>" autocomplete="off" class="form-control" name="nb_enfant">
                          </div>
                          <div class="form-group col-5">
                            <label>Contrat de travail : <span style="color:red">*</span> </label>
                            <input type="file" id="contrat" value="<?php echo $perso['CONTRAT'] ?>" class="form-control-file" name="contrat">
                          </div>
                          <div class="form-group col-5">
                            <label>Permis de conduire : </label>
                            <input type="file" id="permis" value="<?php echo $perso['PERMIS_CONDUIRE'] ?>" class="form-control-file" name="permis">
                          </div>
                          <div class="form-group col-5">
                            <label>Cv : </label>
                            <input type="file" id="cv" value="<?php echo $perso['CV'] ?>" class="form-control-file" name="cv">
                          </div>
                          <div class="form-group col-5">
                            <label>Plan de localisation : </label>
                            <input type="file" id="localisation" value="<?php echo $perso['PLAN_LOCALISATION'] ?>" class="form-control-file" name="localisation">
                          </div>

                          <div class="form-group col-5">
                            <label>Poste : <span style="color:red">*</span> </label>
                            <select class="form-control" name="poste">
                                <?php while ($poste = $postes->fetch()) { ?>
                              <option value="<?= $poste['ID_POSTE']; ?>"><?= $poste['NOM_POSTE']; ?></option>
                            <?php } ?>
                            </select>
                          </div>



                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Adresses</em>
                          </div>

                          <div class="form-group col-5">
                            <label>Num.Orange : <span style="color:red">*</span> </label>
                            <input type="number" id="orange" value="<?php echo $perso['ORANGE'] ?>" autocomplete="off" class="form-control" name="orange">
                          </div>
                          <div class="form-group col-5">
                            <label>Num.Mtn : <span style="color:red">*</span> </label>
                            <input type="number" id="mtn" value="<?php echo $perso['MTN'] ?>" autocomplete="off" class="form-control" name="mtn">
                          </div>
                          <div class="form-group col-5">
                            <label>Numero professionnel : <span style="color:red">*</span> </label>
                            <input type="number" id="num_pro" value="<?php echo $perso['PHONE_PRO'] ?>" autocomplete="off" class="form-control" name="num_pro">
                          </div>
                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Personne a contacter en cas d'urgence</em>
                          </div>
                          <div class="form-group col-5">
                            <label>Numero d'urgence : <span style="color:red">*</span> </label>
                            <input type="text" value="<?php echo $perso['CONTACT_URGENT'] ?>" id="num_urgence" autocomplete="off" class="form-control" name="num_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Nom du concerné : <span style="color:red">*</span> </label>
                            <input type="text" value="<?php echo $perso['NOM_URGENT'] ?>" id="nom_urgence" autocomplete="off" class="form-control" name="nom_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Nature du lien Avec le concerne : <span style="color:red">*</span> </label>
                            <input type="text" value="<?php echo $perso['LIEN_PARENTER'] ?>" id="lien" placeholder="Ex:Mon frere" autocomplete="off" class="form-control" name="lien">
                          </div>

                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Informations Complementaires</em>
                          </div>
                          <div class="form-group col-5">
                            <label>Pointure Chaussure : <span style="color:red">*</span> </label>
                            <input type="text" value="<?php echo $perso['POINTURE'] ?>" id="pointure" autocomplete="off" class="form-control" name="pointure">
                          </div>

                          <div class="form-group col-5">
                            <label>Francais : <span style="color:red">*</span> </label>
                            <select class="form-control" name="fr">
                              <option selected value="lire">Lire</option>
                              <option value="Ecrire">Ecrire</option>
                              <option value="Lire et Ecrire">Lire et Ecrire</option>
                              <option value="Ni Lire Ni ecrire">Ni Lire Ni ecrire</option>
                            </select>
                          </div>
                          <div class="form-group col-5">
                            <label>Anglais : <span style="color:red">*</span> </label>
                            <select class="form-control" name="ang">
                              <option selected value="lire">Lire</option>
                              <option value="Ecrire">Ecrire</option>
                              <option value="Lire et Ecrire">Lire et Ecrire</option>
                              <option value="Ni Lire Ni ecrire">Ni Lire Ni ecrire</option>
                            </select>
                          </div>

                          <div class="form-group col-5">
                            <label>Autre Langue ? : </label>
                            <input type="text" value="<?php echo $perso['AUTRE_LANGUE'] ?>" id="langue" autocomplete="off" class="form-control" name="langue">
                          </div>

                          </div>

                          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <input type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" name="submit" value="Mise à jour">
                          </div>
                          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <a href="tables.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Annuler</a>
                          </div>

                        </div>
                      </form>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require 'modal.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
