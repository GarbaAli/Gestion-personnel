<?php
session_start();
  require 'is_connect.php';
require ('function.php');
require 'bd.php';
    $postes =  All_poste();
  $id_personnel = $_GET['ID_PERSONNEL'];
  $perso = personnel($id_personnel);


     if(isset($_POST['submit'])){

    if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $perso['NOM']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertnom = $bdd->prepare("UPDATE personnel SET NOM = ? WHERE ID_PERSONNEL = ? ");
      $insertnom->execute(array($newnom, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

	 if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $perso['PRENOM']) {
      $newprenom = htmlspecialchars($_POST['newprenom']);
      $insertprenom = $bdd->prepare("UPDATE personnel SET PRENOM = ? WHERE ID_PERSONNEL = ?");
      $insertprenom->execute(array($newprenom, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

    if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $perso['VILLE_RESIDENCE']) {
      $newpseudo = htmlspecialchars($_POST['newville']);
      $insertpseudo = $bdd->prepare("UPDATE personnel SET VILLE_RESIDENCE = ? WHERE ID_PERSONNEL = ?");
      $insertpseudo->execute(array($newpseudo, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

    if(isset($_POST['newquartier']) AND !empty($_POST['newquartier']) AND $_POST['newquartier'] != $perso['QUARTIER']) {
      $newlkdn = htmlspecialchars($_POST['newquartier']);
      $insertybe = $bdd->prepare("UPDATE personnel SET QUARTIER = ? WHERE ID_PERSONNEL = ?");
      $insertybe->execute(array($newlkdn, $id_personnel));
      header('Location: tables.php');                                                                                                                                                                                 
      set_flash('Modification Effectuer ','success');
   }

    if(isset($_POST['newmatrimonial']) AND !empty($_POST['newmatrimonial']) AND $_POST['newmatrimonial'] != $perso['ETAT_MATRIMONIAL']) {
      $newtwit = htmlspecialchars($_POST['newmatrimonial']);
      $insertybe = $bdd->prepare("UPDATE personnel SET ETAT_MATRIMONIAL = ? WHERE ID_PERSONNEL = ?");
      $insertybe->execute(array($newtwit, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }


   if(isset($_POST['newnb_enfant']) AND !empty($_POST['newnb_enfant']) AND $_POST['newnb_enfant'] != $perso['NBRE_ENFANT']) {
      $nbenfant = htmlspecialchars($_POST['newnb_enfant']);
      $insertybe = $bdd->prepare("UPDATE personnel SET NBRE_ENFANT = ? WHERE ID_PERSONNEL = ?");
      $insertybe->execute(array($nbenfant, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

   if(isset($_POST['neworange']) AND !empty($_POST['neworange']) AND $_POST['neworange'] != $perso['ORANGE']) {
      $newfcb = htmlspecialchars($_POST['neworange']);
      $insertfcb = $bdd->prepare("UPDATE personnel SET ORANGE = ? WHERE ID_PERSONNEL = ?");
      $insertfcb->execute(array($newfcb, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

   if(isset($_POST['newmtn']) AND !empty($_POST['newmtn']) AND $_POST['newmtn'] != $perso['MTN']) {
      $newmail = htmlspecialchars($_POST['newmtn']);
      $insertmail = $bdd->prepare("UPDATE personnel SET MTN = ? WHERE ID_PERSONNEL = ?");
      $insertmail->execute(array($newmail, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

         if(isset($_POST['newnum_pro']) AND !empty($_POST['newnum_pro']) AND $_POST['newnum_pro'] != $perso['PHONE_PRO']) {
      $newniveau = htmlspecialchars($_POST['newnum_pro']);
      $insertniveau = $bdd->prepare("UPDATE personnel SET PHONE_PRO = ? WHERE ID_PERSONNEL = ?");
      $insertniveau->execute(array($newniveau, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

	   if(isset($_POST['newnum_urgence']) AND !empty($_POST['newnum_urgence']) AND $_POST['newnum_urgence'] != $perso['CONTACT_URGENT']) {
      $newtel = htmlspecialchars($_POST['newnum_urgence']);
      $inserttel = $bdd->prepare("UPDATE personnel SET CONTACT_URGENT = ? WHERE ID_PERSONNEL = ?");
      $inserttel->execute(array($newtel, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

        if(isset($_POST['newnom_urgence']) AND !empty($_POST['newnom_urgence']) AND $_POST['newnom_urgence'] != $perso['NOM_URGENT']) {
      $newets = htmlspecialchars($_POST['newnom_urgence']);
      $insertets = $bdd->prepare("UPDATE personnel SET NOM_URGENT = ? WHERE ID_PERSONNEL = ?");
      $insertets->execute(array($newets, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
   }

       if(isset($_POST['newlien']) AND !empty($_POST['newlien']) AND $_POST['newlien'] != $perso['LIEN_PARENTER']) {
     $lien = htmlspecialchars($_POST['newlien']);
     $insertets = $bdd->prepare("UPDATE personnel SET LIEN_PARENTER = ? WHERE ID_PERSONNEL = ?");
     $insertets->execute(array($lien, $id_personnel));
     header('Location: tables.php');
     set_flash('Modification Effectuer ','success');
    }
    if(isset($_POST['newlanguefr']) AND !empty($_POST['newlanguefr']) AND $_POST['newlanguefr'] != $perso['FRANCAIS']) {
    $newets = htmlspecialchars($_POST['newlanguefr']);
    $insertets = $bdd->prepare("UPDATE personnel SET FRANCAIS = ? WHERE ID_PERSONNEL = ?");
    $insertets->execute(array($newets, $id_personnel));
    header('Location: tables.php');
    set_flash('Modification Effectuer ','success');
    }
    if(isset($_POST['newlangueang']) AND !empty($_POST['newlangueang']) AND $_POST['newlangueang'] != $perso['ANGLAIS']) {
    $newets = htmlspecialchars($_POST['newlangueang']);
    $insertets = $bdd->prepare("UPDATE personnel SET ANGLAIS = ? WHERE ID_PERSONNEL = ?");
    $insertets->execute(array($newets, $id_personnel));
    header('Location: tables.php');
    set_flash('Modification Effectuer ','success');
    }
    if(isset($_POST['newlangue']) AND !empty($_POST['newlangue']) AND $_POST['newlangue'] != $perso['AUTRE_LANGUE']) {
    $newets = htmlspecialchars($_POST['newlangue']);
    $insertets = $bdd->prepare("UPDATE personnel SET AUTRE_LANGUE = ? WHERE ID_PERSONNEL = ?");
    $insertets->execute(array($newets, $id_personnel));
    header('Location: tables.php');
    set_flash('Modification Effectuer ','success');
    }
    if(isset($_POST['newstatut']) AND !empty($_POST['newstatut']) AND $_POST['newstatut'] != $perso['STATUT']) {
      $newstatut = htmlspecialchars($_POST['newstatut']);
      $insertets = $bdd->prepare("UPDATE personnel SET STATUT = ? WHERE ID_PERSONNEL = ?");
      $insertets->execute(array($newstatut, $id_personnel));
      header('Location: tables.php');
      set_flash('Modification Effectuer ','success');
      }

    }
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="newviewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="newdescription" content="">
    <meta name="newauthor" content="">

    <title>2N-Nouveau Personnel</title>

    <!-- Custom fonts for this template-->
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
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
                          <h1 class="h3 mb-0 text-gray-800">personnel [ <?php echo $perso['NOM'] ?> ]</h1>
                          <input type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" name="submit" value="Sauvegarder">
                          <a href="tables.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Annuler</a>
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
                              <input style="border-radius:0px"  value="<?php echo $perso['NOM'] ?>" type="text" id="nom" autocomplete="off" class="form-control" name="newnom">
                            </div>
                          </div>
                          <div class="form-group col-5">
                            <label for="prenom">Prenom : <span style="color:red">*</span> </label>
                            <input type="text"  value="<?php echo $perso['PRENOM'] ?>" id="prenom" autocomplete="off" class="form-control" name="newprenom">
                          </div>
                          <div class="form-group col-5">
                            <label>Ville de residence : <span style="color:red">*</span> </label>
                            <input type="text" id="ville"  value="<?php echo $perso['VILLE_RESIDENCE'] ?>" autocomplete="off" class="form-control" name="newville">
                          </div>
                          <div class="form-group col-5">
                            <label>Quartier : <span style="color:red">*</span> </label>
                            <input type="text" id="quartier"  value="<?php echo $perso['QUARTIER'] ?>" autocomplete="off" class="form-control" name="newquartier">
                          </div>
                          <div class="form-group col-5">
                            <label>Etat Matrimonial : <span style="color:red">*</span> </label>
                            <input type="text" id="matrimonial"  value="<?php echo $perso['ETAT_MATRIMONIAL'] ?>" autocomplete="off" class="form-control" name="newmatrimonial">
                          </div>
                          <div class="form-group col-5">
                            <label>Nombre d'enfant : <span style="color:red">*</span> </label>
                            <input type="text" id="ville"  value="<?php echo $perso['NBRE_ENFANT'] ?>" autocomplete="off" class="form-control" name="newnb_enfant">
                          </div>
                          <div class="form-group col-5">
                            <label>Matricule : <span style="color:red">*</span> </label>
                            <input type="text" id="matricule"  value="<?php echo $perso['MATRICULE'] ?>" autocomplete="off" class="form-control" name="matricule">
                          </div>

                          <div class="form-group col-5">
                            <label>Poste : <span style="color:red">*</span> </label>
                            <select class="form-control" name="newposte">
                                <?php while ($poste = $postes->fetch()) { ?>
                              <option value="<?= $poste['ID_POSTE']; ?>"><?= $poste['NOM_POSTE']; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-5">
                            <label>Statut : <span style="color:red">*</span> </label>
                            <select class="form-control" name="newstatut">
                              <option value="Actif">Actif</option>
                              <option value="Inactif">Inactif</option>
                            </select>
                          </div>

                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Adresses</em>
                          </div>

                          <div class="form-group col-5">
                            <label>Num.Orange : <span style="color:red">*</span> </label>
                            <input type="number" id="orange"  value="<?php echo $perso['ORANGE'] ?>" autocomplete="off" class="form-control" name="neworange">
                          </div>
                          <div class="form-group col-5">
                            <label>Num.Mtn : <span style="color:red">*</span> </label>
                            <input type="number" id="mtn"  value="<?php echo $perso['MTN'] ?>" autocomplete="off" class="form-control" name="newmtn">
                          </div>
                          <div class="form-group col-5">
                            <label>Numero professionnel : <span style="color:red">*</span> </label>
                            <input type="number" id="num_pro"  value="<?php echo $perso['PHONE_PRO'] ?>" autocomplete="off" class="form-control" name="newnum_pro">
                          </div>
                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Personne a contacter en cas d'urgence</em>
                          </div>
                          <div class="form-group col-5">
                            <label>Numero d'urgence : <span style="color:red">*</span> </label>
                            <input type="text"  value="<?php echo $perso['CONTACT_URGENT'] ?>" id="num_urgence" autocomplete="off" class="form-control" name="newnum_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Nom du concerné : <span style="color:red">*</span> </label>
                            <input type="text"  value="<?php echo $perso['NOM_URGENT'] ?>" id="nom_urgence" autocomplete="off" class="form-control" name="newnom_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Nature du lien Avec le concerne : <span style="color:red">*</span> </label>
                            <input type="text"  value="<?php echo $perso['LIEN_PARENTER'] ?>" id="lien" placeholder="Ex:Mon frere" autocomplete="off" class="form-control" name="newlien">
                          </div>

                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Informations Complementaires</em>
                          </div>
                          <div class="form-group col-5">
                            <label>Pointure Chaussure : <span style="color:red">*</span> </label>
                            <input type="text"  value="<?php echo $perso['POINTURE'] ?>" id="pointure" autocomplete="off" class="form-control" name="newpointure">
                          </div>

                          <div class="form-group col-5">
                            <label>Anglais : <span style="color:red">*</span> </label>
                            <select class="form-control" name="newlanguefr">
                              <option value="lire">Lire</option>
                              <option value="Ecrire">Ecrire</option>
                              <option value="Lire et Ecrire">Lire et Ecrire</option>
                              <option value="Ni Lire Ni ecrire">Ni Lire Ni ecrire</option>
                            </select>
                          </div>
                          <div class="form-group col-5">
                            <label>Anglais : <span style="color:red">*</span> </label>
                            <select class="form-control" name="newlangueang">
                              <option value="lire">Lire</option>
                              <option value="Ecrire">Ecrire</option>
                              <option value="Lire et Ecrire">Lire et Ecrire</option>
                              <option value="Ni Lire Ni ecrire">Ni Lire Ni ecrire</option>
                            </select>
                          </div>

                          <div class="form-group col-5">
                            <label>Autre Langue ? : </label>
                            <input type="text"  value="<?php echo $perso['AUTRE_LANGUE'] ?>" id="langue" autocomplete="off" class="form-control" name="newlangue">
                          </div><hr>
                          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <a href="tables.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Annuler</a>
                          </div>

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
