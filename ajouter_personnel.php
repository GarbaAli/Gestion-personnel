<?php
session_start();
  require 'is_connect.php';
require ('function.php');
require 'bd.php';
  $postes =  All_poste();


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
    $numpro = verifie($num_pro);
    $num_urgence = verifie($num_urgence);
    $nom_urgence = verifie($nom_urgence);
    $lien = verifie($lien);
    $pointure = verifie($pointure);
    $fr = verifie($fr);
    $ang = verifie($ang);
    $langue = verifie($langue);
    $poste = verifie($poste);
    $matricule = verifie($matricule);
    $cni = '';
    $permis = '';
    $localisation = '';
    $cv = '';
    $contrat = '';
    $statut = 'Actif';
    $error = '';
    $ok = '';


    if (empty($nom)) {
        $error .= 'Le champ nom est requis. <br>';
    }
    if (empty($prenom)) {
        $error .= 'Le champ prenom est requis.  <br>';
    }
    if (!empty($nb_enfant)) {
      if ($nb_enfant >= 25) {
          $error .= 'Le nombre d enfants saisi est assez consequent.  <br>';
      }

    }
    if (empty($ville)) {
        $error .= 'Le champ Ville est requis.  <br>';
    }
    if (empty($quartier)) {
        $error .= 'Le champ quartier est requis. <br>';
    }
    if (empty($matrimonial)) {
        $error .= 'Le regime matrimonial est obligatoire. <br>';
    }
    if (empty($num_urgence)) {
        $error .= 'Remplir le numero d urgence.  <br>';
    }
    if (empty($nom_urgence)) {
        $error .= 'donner le nom de le personne a appeller en cas durgence. <br>';
    }
    if (empty($lien)) {
        $error .= 'Le champ lien est requis. <br>';
    }
    if (empty($fr)) {
        $error .= 'pour le francais, faite un choix. <br>';
    }
    if (empty($ang)) {
        $error .= 'pour Anglais, faite un choix . <br>';
    }

    if (!empty($_FILES['cni']['name'])) {
      $cni = htmlentities($_FILES['cni']['name']);
      $cni_size = $_FILES['cni']['size'];
      $cni_temp = $_FILES['cni']['tmp_name'];
      $tailleMax = 2097152;
      $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
      if ($cni_size <= $tailleMax){
          $extensionUplaod = strtolower(substr(strrchr($cni, '.'), 1));
          if (!file_exists('personnels/'.$prenom)) {
            mkdir('personnels/'.$prenom , 0755);
          }
          if (in_array($extensionUplaod, $extensionValide)){
              move_uploaded_file($cni_temp,'personnels/'.$prenom.'/'.$cni);
          }else{
              $error .= 'La cni doit etre au format suivant (GIF,JPG,JPEG,PNG) . <br>';
          }
      }else{
            $error .= 'La taille du fichier cni doit etre superieur a 2 megas . <br>';
      }
    }
// contrat
    if (!empty($_FILES['contrat']['name'])) {
      $contrat = htmlentities($_FILES['contrat']['name']);
      $contrat_size = $_FILES['contrat']['size'];
      $contrat_temp = $_FILES['contrat']['tmp_name'];
      $tailleMax = 2097152;
      $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
      if ($contrat_size <= $tailleMax){
          $extensionUplaod = strtolower(substr(strrchr($contrat, '.'), 1));
          if (!file_exists('personnels/'.$prenom)) {
            mkdir('personnels/'.$prenom , 0755);
          }
          if (in_array($extensionUplaod, $extensionValide)){
              move_uploaded_file($contrat_temp,'personnels/'.$prenom.'/'.$contrat);
          }else{
              $error .= 'Le contrat doit etre au format suivant (GIF,JPG,JPEG,PNG) . <br>';
          }
      }else{
            $error .= 'La taille du fichier contrat doit etre superieur a 2 megas . <br>';
      }
    }

// permis
    if (!empty($_FILES['permis']['name'])) {
      $permis = htmlentities($_FILES['permis']['name']);
      $permis_size = $_FILES['permis']['size'];
      $permis_temp = $_FILES['permis']['tmp_name'];
      $tailleMax = 2097152;
      $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
      if ($permis_size <= $tailleMax){
          $extensionUplaod = strtolower(substr(strrchr($permis, '.'), 1));
          if (!file_exists('personnels/'.$prenom)) {
            mkdir('personnels/'.$prenom , 0755);
          }
          if (in_array($extensionUplaod, $extensionValide)){
              move_uploaded_file($permis_temp,'personnels/'.$prenom.'/'.$permis);
          }else{
              $error .= 'Le permis doit etre au format suivant (GIF,JPG,JPEG,PNG) . <br>';
          }
      }else{
            $error .= 'La taille du fichier permis doit etre superieur a 2 megas . <br>';
      }
    }
    // cv
        if (!empty($_FILES['cv']['name'])) {
          $cv = htmlentities($_FILES['cv']['name']);
          $cv_size = $_FILES['cv']['size'];
          $cv_temp = $_FILES['cv']['tmp_name'];
          $tailleMax = 2097152;
        $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
          if ($cv_size <= $tailleMax){
              $extensionUplaod = strtolower(substr(strrchr($cv, '.'), 1));
              if (!file_exists('personnels/'.$prenom)) {
                mkdir('personnels/'.$prenom , 0755);
              }
              if (in_array($extensionUplaod, $extensionValide)){
                  move_uploaded_file($cv_temp,'personnels/'.$prenom.'/'.$cv);
              }else{
                  $error .= 'Le cv doit etre au format suivant (GIF,JPG,JPEG,PNG) . <br>';
              }
          }else{
                $error .= 'La taille du fichier cv doit etre superieur a 2 megas . <br>';
          }
        }

        // plan localisation
            if (!empty($_FILES['localisation']['name'])) {
                $localisation = htmlentities($_FILES['localisation']['name']);
              $localisation_size = $_FILES['localisation']['size'];
              $localisation_temp = $_FILES['localisation']['tmp_name'];
              $tailleMax = 2097152;
              $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
              if ($localisation_size <= $tailleMax){
                  $extensionUplaod = strtolower(substr(strrchr($localisation, '.'), 1));
                  if (!file_exists('personnels/'.$prenom)) {
                    mkdir('personnels/'.$prenom , 0755);
                  }
                  if (in_array($extensionUplaod, $extensionValide)){
                      move_uploaded_file($localisation_temp,'personnels/'.$prenom.'/'.$localisation);
                  }else{
                      $error .= 'La localisation doit etre au format suivant (GIF,JPG,JPEG,PNG,PDF) . <br>';
                  }
              }else{
                    $error .= 'La taille du fichier localisation doit etre superieur a 2 megas . <br>';
              }
            }

              // doc 1
              if (!empty($_FILES['doc1']['name'])) {
                $doc1 = htmlentities($_FILES['doc1']['name']);
              $doc1_size = $_FILES['doc1']['size'];
              $doc1_temp = $_FILES['doc1']['tmp_name'];
              $tailleMax = 2097152;
              $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
              if ($doc1_size <= $tailleMax){
                  $extensionUplaod = strtolower(substr(strrchr($doc1, '.'), 1));
                  if (!file_exists('personnels/'.$prenom)) {
                    mkdir('personnels/'.$prenom , 0755);
                  }
                  if (in_array($extensionUplaod, $extensionValide)){
                      move_uploaded_file($doc1_temp,'personnels/'.$prenom.'/'.$doc1);
                  }else{
                      $error .= 'Le fichier '.$doc1.' doit etre au format suivant (GIF,JPG,JPEG,PNG,PDF) . <br>';
                  }
              }else{
                   $error .= 'La taille du fichier '.$doc1.' doit etre superieur a 2 megas . <br>';
              }
            }

            // doc 2
            if (!empty($_FILES['doc2']['name'])) {
              $doc2 = htmlentities($_FILES['doc2']['name']);
            $doc2_size = $_FILES['doc2']['size'];
            $doc2_temp = $_FILES['doc2']['tmp_name'];
            $tailleMax = 2097152;
            $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
            if ($doc2_size <= $tailleMax){
                $extensionUplaod = strtolower(substr(strrchr($doc2, '.'), 1));
                if (!file_exists('personnels/'.$prenom)) {
                  mkdir('personnels/'.$prenom , 0755);
                }
                if (in_array($extensionUplaod, $extensionValide)){
                    move_uploaded_file($doc2_temp,'personnels/'.$prenom.'/'.$doc2);
                }else{
                    $error .= 'Le fichier '.$doc2.' doit etre au format suivant (GIF,JPG,JPEG,PNG,PDF) . <br>';
                }
            }else{
                  $error .= 'La taille du fichier '.$doc2.' doit etre superieur a 2 megas . <br>';
            }
          }

          // doc 3
          if (!empty($_FILES['doc3']['name'])) {
            $doc3 = htmlentities($_FILES['doc3']['name']);
          $doc3_size = $_FILES['doc3']['size'];
          $doc3_temp = $_FILES['doc3']['tmp_name'];
          $tailleMax = 2097152;
          $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
          if ($doc3_size <= $tailleMax){
              $extensionUplaod = strtolower(substr(strrchr($doc3, '.'), 1));
              if (!file_exists('personnels/'.$prenom)) {
                mkdir('personnels/'.$prenom , 0755);
              }
              if (in_array($extensionUplaod, $extensionValide)){
                  move_uploaded_file($doc3_temp,'personnels/'.$prenom.'/'.$doc3);
              }else{
                  $error .= 'Le fichier '.$doc3.' doit etre au format suivant (GIF,JPG,JPEG,PNG,PDF) . <br>';
              }
          }else{
            $error .= 'La taille du fichier '.$doc3.' doit etre superieur a 2 megas . <br>';
          }
        }

         // doc 4
         if (!empty($_FILES['doc4']['name'])) {
          $doc4 = htmlentities($_FILES['doc4']['name']);
        $doc4_size = $_FILES['doc4']['size'];
        $doc4_temp = $_FILES['doc4']['tmp_name'];
        $tailleMax = 2097152;
        $extensionValide  = array('jpg','gif','png','jpeg','JPG','GIF','PNG','JPEG','pdf','PDF');
        if ($doc4_size <= $tailleMax){
            $extensionUplaod = strtolower(substr(strrchr($doc4, '.'), 1));
            if (!file_exists('personnels/'.$prenom)) {
              mkdir('personnels/'.$prenom , 0755);
            }
            if (in_array($extensionUplaod, $extensionValide)){
                move_uploaded_file($doc4_temp,'personnels/'.$prenom.'/'.$doc4);
            }else{
                $error .= 'Le fichier '.$doc4.' doit etre au format suivant (GIF,JPG,JPEG,PNG,PDF) . <br>';
            }
        }else{
          $error .= 'La taille du fichier '.$doc4.' doit etre superieur a 2 megas . <br>';
        }
      }

    if ($error == '') {
         $req = $bdd->prepare("INSERT INTO `personnel` (`ID_PERSONNEL`, `ID_POSTE`, `NOM`, `PRENOM`, `mdp`, `ORANGE`, `MTN`, `PHONE_PRO`, `CNI`, `VILLE_RESIDENCE`, `QUARTIER`, `DTE_EMBAUCHE`, `CONTRAT`, `PERMIS_CONDUIRE`, `CONTACT_URGENT`, `NOM_URGENT`, `LIEN_PARENTER`,
         `PLAN_LOCALISATION`, `ETAT_MATRIMONIAL`, `NBRE_ENFANT`, `POINTURE`, `CV`, `FRANCAIS`, `ANGLAIS`, `AUTRE_LANGUE`, `ROLE`, `STATUT`, `MATRICULE`,`DOC1`,`DOC2`,`DOC3`,`DOC4`)
          VALUES (NULL, :id_poste, :nom, :prenom, NULL, :orange, :mtn, :phone_pro, :cni, :ville, :quartier, current_timestamp(), :contrat, :permis, :contact, :nom_urgent, :lien, :plan, :matrimonial, :nb_enfant, :pointure, :cv, :francais, :anglais,
          :langue, NULL, :statut, :matricule,:doc1,:doc2,:doc3,:doc4)" );
          
           $req->execute([
             'id_poste'=> $poste,
             'nom'=> $nom,
             'prenom'=> $prenom,
             'orange'=> $orange,
             'mtn'=> $mtn,
             'phone_pro'=> $numpro,
             'cni'=> $cni,
             'ville'=> $ville,
             'quartier'=> $quartier,
             'contrat'=> $contrat,
             'permis'=> $permis,
             'contact'=> $num_urgence,
             'nom_urgent'=> $num_urgence,
             'lien'=> $lien,
             'plan'=> $localisation,
             'matrimonial'=> $matrimonial,
             'nb_enfant'=> $nb_enfant,
             'pointure'=> $pointure,
             'cv'=> $cv,
             'francais'=> $fr,
             'anglais'=> $ang,
             'langue'=> $langue,
             'matricule'=> $matricule,
              'statut'=> $statut,
              'doc1'=> $doc1,
              'doc2'=> $doc2,
              'doc3' => $doc3,
              'doc4' => $doc4
           ]);
         $ok = 1;

         if ($ok === 1) {
           header('location:tables.php');
           set_flash($nom.' '.$prenom. ' Insere avec success','success',50);
         }




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
                  <form id="form_personnel" action="" method="post" enctype="multipart/form-data">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Nouveau Personnel</h1>
                    </div>
                    <hr>

                    <!-- Contenue de la page -->

                        <div class="row">
                          <div class="col-12">
                            <?php if (isset($error)) {
                              echo message_flash($error,'danger',350);
                            } ?>
                          </div>
                          <div class="col-12">
                            <hr>
                            <em style="color:#000;font-size:20px">Informations De Base</em>
                          </div>
                        </div>
                        <div class="row" style="border:1px solid silver;box-shadow: 0 0 5px 0">
                          
                          <div class="form-group col-5">
                            <div class="form-group">
                              <label for="nom">Noms <span style="color:red">*</span> </label>
                              <input style="border-radius:0px" type="text" value="<?php if (isset($nom)){echo $nom; } ?>" id="nom" autocomplete="off" class="form-control" name="nom">
                            </div>
                          </div>
                          <div class="form-group col-5">
                            <label for="prenom">Prenoms : <span style="color:red">*</span> </label>
                            <input type="text" id="prenom" value="<?php if (isset($prenom)){echo $prenom; } ?>" autocomplete="off" class="form-control" name="prenom">
                          </div>
                          <div class="form-group col-5">
                            <label>Ville De Résidence : <span style="color:red">*</span> </label>
                            <input type="text" id="ville" value="<?php if (isset($ville)){echo $ville; } ?>" autocomplete="off" class="form-control" name="ville">
                          </div>
                          <div class="form-group col-5">
                            <label>Quartier : <span style="color:red">*</span> </label>
                            <input type="text" id="quartier" value="<?php if (isset($quartier)){echo $quartier; } ?>" autocomplete="off" class="form-control" name="quartier">
                          </div>
                          <div class="form-group col-5">
                            <label>Etat Matrimonial : <span style="color:red">*</span> </label>
                            <select class="form-control" name="matrimonial" id="matrimonial">
                              <option selected value="celibataire">Célibataire</option>
                              <option value="marié(e)">Marié(e)</option>
                              <option value="divorcer">Divorcé(é)</option>
                              <option value="veuve">Veuf(Ve)</option>
                            </select>
                          </div>
                          <div class="form-group col-5">
                            <label>Nombre d'enfant : </label>
                            <input type="text" maxlength="2" value="<?php if (isset($nb_enfant)){echo $nb_enfant; } ?>" autocomplete="off" class="form-control" name="nb_enfant">
                          </div>
                          <div class="form-group col-5">
                            <label>Matricule CNPS :  </label>
                            <input type="text" value="<?php if (isset($matricule)){echo $matricule; } ?>" autocomplete="off" class="form-control" name="matricule">
                          </div>
                          <div class="form-group col-5">
                            <label>Poste : <span style="color:red">*</span> </label>
                            <select class="form-control" name="poste">
                                <?php while ($poste = $postes->fetch()) { ?>
                              <option value="<?= $poste['ID_POSTE']; ?>"><?= $poste['NOM_POSTE']; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-5">
                            <label>Contrat De Travail : <span style="color:red">*</span> </label>
                            <input type="file" id="contrat" class="form-control-file" name="contrat">
                          </div>
                          <div class="form-group col-5">
                            <label>Permis De Conduire : </label>
                            <input type="file" id="permis" class="form-control-file" name="permis">
                          </div>
                          <div class="form-group col-5">
                            <label>CV : </label>
                            <input type="file" id="cv" class="form-control-file" name="cv">
                          </div>
                          <div class="form-group col-5">
                            <label>Carte National d'Identité (CNI) :  </label>
                            <input type="file"  class="form-control-file" name="cni">
                          </div>
                          <div class="form-group col-5">
                            <label>Plan De Localisation : </label>
                            <input type="file" id="localisation" class="form-control-file" name="localisation">
                          </div>
                          <div class="form-group col-5">
                            <button id="plus" ><i class="fa fa-plus"></i>Plus de documents</button>
                          </div>
                        
                            <div class="form-group col-5 cacher">
                                <label>Autre document 1 : </label>
                                <input type="file" class="form-control-file" name="doc1">
                              </div>
                              <div class="form-group col-5 cacher">
                                <label>Autre document 2 : </label>
                                <input type="file"  class="form-control-file" name="doc2">
                              </div>
                              <div class="form-group col-5 cacher">
                                <label>Autre document 3 : </label>
                                <input type="file"  class="form-control-file" name="doc3">
                              </div>
                              <div class="form-group col-5 cacher">
                                <label>Autre document 4 : </label>
                                <input type="file"  class="form-control-file" name="doc4">
                              </div>
                            </div>
                        
                        <div class="col-12">
                            <em style="color:#000;font-size:20px">Adresses</em>
                        </div>

                        <div class="row" style="border:1px solid silver;margin-top:10px;box-shadow: 0 0 5px 0">
                          

                          <div class="form-group col-5">
                            <label>Numéro Personnel 1 : </label>
                            <input type="text" value="<?php if (isset($orange)){echo $orange; } ?>" id="orange" autocomplete="off" class="form-control" name="orange">
                          </div>
                          <div class="form-group col-5">
                            <label>Numéro Personnel 2: </label>
                            <input type="text" value="<?php if (isset($mtn)){echo $mtn; } ?>" id="mtn" autocomplete="off" class="form-control" name="mtn">
                          </div>
                          <div class="form-group col-5">
                            <label>Numéro Professionnel : </label>
                            <input type="text" value="<?php if (isset($numpro)){echo $numpro; } ?>" id="num_pro" autocomplete="off" class="form-control" name="num_pro">
                          </div>
                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Personne a Contacter En Cas D'Urgence</em>
                          </div>
                          <div class="form-group col-5">
                            <label>Numero D'Urgence : <span style="color:red">*</span> </label>
                            <input type="text" id="num_urgence" value="<?php if (isset($num_urgence)){echo $num_urgence; } ?>" autocomplete="off" class="form-control" name="num_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Nom Du Concerné : <span style="color:red">*</span> </label>
                            <input type="text" id="nom_urgence" value="<?php if (isset($nom_urgence)){echo $nom_urgence; } ?>" autocomplete="off" class="form-control" name="nom_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Lien De Parenté : <span style="color:red">*</span> </label>
                            <input type="text" id="lien" value="<?php if (isset($lien)){echo $lien; } ?>" placeholder="Ex:Mon frere" autocomplete="off" class="form-control" name="lien">
                          </div>
                        </div>


                          <div class="col-12">
                            <em style="color:#000;font-size:20px">Informations Complementaires</em>
                          </div>
                          <div class="row" style="border:1px solid silver;margin-top:10px;box-shadow: 0 0 5px 0">
                          
                          <div class="form-group col-5">
                            <label>Pointure Chaussure : </label>
                            <input type="text" value="<?php if (isset($pointure)){echo $pointure; } ?>" id="pointure" autocomplete="off" class="form-control" name="pointure">
                          </div>

                          <div class="form-group col-5">
                            <label>Francais :  </label>
                            <select class="form-control" name="fr">
                              <option selected value="lire">Lire</option>
                              <option value="Ecrire">Ecrire</option>
                              <option value="Lire et Ecrire">Lire et Ecrire</option>
                              <option value="Ni Lire Ni ecrire">Ni Lire Ni ecrire</option>
                            </select>
                          </div>
                          <div class="form-group col-5">
                            <label>Anglais : </label>
                            <select class="form-control" name="ang">
                              <option selected value="lire">Lire</option>
                              <option value="Ecrire">Ecrire</option>
                              <option value="Lire et Ecrire">Lire et Ecrire</option>
                              <option value="Ni Lire Ni ecrire">Ni Lire Ni ecrire</option>
                            </select>
                          </div>

                          <div class="form-group col-5">
                            <label>Autre Langue ? : </label>
                            <input type="text" id="langue" value="<?php if (isset($langue)){echo $langue; } ?>" autocomplete="off" class="form-control" name="langue">
                          </div>
                          </div>
                          <div class="row">
                          <div class="form-group col-2" style="margin-top:20px">
                              
                              </div>
                              <div class="form-group col-6" style="margin-top:20px">
                              <input type="submit" style="width:100%" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" name="submit" value="Sauvegarder">
                              </div>
                              <div class="form-group col-3" style="margin-top:20px">
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
        <i class="fa fa-angle-up"></i>
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
    <script>
      $(document).ready(function(e){

        $('.cacher').hide();
        $('#plus').click(function(e){
          if($('.cacher').is(":hidden")){
            $(this).text("Fermer");
          }else{
            $(this).text("Plus documents");
          }

          $('.cacher').toggle('slow');
          $('html,body').animate({
            scrollTop:$('.cacher').prev().offset().top + $('.cacher')[0].srollHeight
          },1500);

          return false;
         

        });



      });
    </script>

</body>

</html>
