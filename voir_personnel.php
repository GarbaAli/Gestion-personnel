<?php
session_start();
  require 'is_connect.php';
require ('function.php');

  $id_personnel = $_GET['ID_PERSONNEL'];
  $perso = personnel($id_personnel);
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
                        <h1 class="h3 mb-0 text-gray-800">Personnel [ <?php echo $perso['NOM'] ?> ]</h1>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="tables.php">RETOUR</a>
                        
                        
                        <?php if(!empty($perso['CNI'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['CNI'] ?>">CNI</a>
                        <?php } ?>

                        <?php if(!empty($perso['PERMIS_CONDUIRE'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['PERMIS_CONDUIRE'] ?>">PERMIS DE CONDUIRE</a>
                        <?php } ?>

                        <?php if(!empty($perso['CONTRAT'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['CONTRAT'] ?>">CONTRAT</a>
                        <?php } ?>

                        <?php if(!empty($perso['CV'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['CV'] ?>">CV</a>
                        <?php } ?>
                        
                        <?php if(!empty($perso['PLAN_LOCALISATION'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['PLAN_LOCALISATION'] ?>">PLAN DE LOCALISATION</a>
                        <?php } ?>

                        <?php if(isset($perso['DOC1'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['DOC1'] ?>"><?= @$perso['DOC1'] ?></a>
                        <?php } ?>

                        <?php if(isset($perso['DOC2'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['DOC2'] ?>"><?= @$perso['DOC2'] ?></a>
                        <?php } ?>

                        <?php if(isset($perso['DOC3'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['DOC3'] ?>"><?= @$perso['DOC3'] ?></a>
                        <?php } ?>

                        <?php if(isset($perso['DOC4'])){ ?>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="personnels/<?= get_user($perso['ID_PERSONNEL']); ?>/<?= $perso['DOC4'] ?>"><?= @$perso['DOC4'] ?></a>
                        <?php } ?>

                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="voir.php?ID_PERSONNEL=<?php echo $perso['ID_PERSONNEL'] ?>">IMPRIMER</a>


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
                            <em style="color:#000;font-size:20px;text-decoration:underline">Informations de base</em>
                          </div>
                          <div class="form-group col-5">
                            <div class="form-group">
                              <label for="nom">Nom : </label>
                              <input style="border-radius:0px" disabled value="<?php echo $perso['NOM'] ?>" type="text" id="nom" autocomplete="off" class="form-control" name="nom">
                            </div>
                          </div>
                          <div class="form-group col-5">
                            <label for="prenom">Prenom :  </label>
                            <input type="text" disabled value="<?php echo $perso['PRENOM'] ?>" id="prenom" autocomplete="off" class="form-control" name="prenom">
                          </div>
                          <div class="form-group col-5">
                            <label>Ville de residence :  </label>
                            <input type="text" id="ville" disabled value="<?php echo $perso['VILLE_RESIDENCE'] ?>" autocomplete="off" class="form-control" name="ville">
                          </div>
                          <div class="form-group col-5">
                            <label>Quartier :  </label>
                            <input type="text" id="quartier" disabled value="<?php echo $perso['QUARTIER'] ?>" autocomplete="off" class="form-control" name="quartier">
                          </div>
                          <div class="form-group col-5">
                            <label>Etat Matrimonial :  </label>
                            <input type="text" id="matrimonial" disabled value="<?php echo $perso['ETAT_MATRIMONIAL'] ?>" autocomplete="off" class="form-control" name="matrimonial">
                          </div>
                          <div class="form-group col-5">
                            <label>Nombre d'enfant :  </label>
                            <input type="text" id="ville" disabled value="<?php echo $perso['NBRE_ENFANT'] ?>" autocomplete="off" class="form-control" name="nb_enfant">
                          </div>
                          <div class="form-group col-5">
                            <label>Matricule :  </label>
                            <input type="text" id="matricule" disabled value="<?php echo $perso['MATRICULE'] ?>" autocomplete="off" class="form-control" name="matricule">
                          </div>

                          <div class="form-group col-5">
                            <label>Poste :  </label>
                            <input type="text" id="ville"  disabled value="<?= get_poste($perso['ID_POSTE']); ?>" autocomplete="off" class="form-control" name="nb_enfant">
                          </div>



                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Adresses</em>
                          </div>

                          <div class="form-group col-5">
                            <label>Numéro Personnel 1 :  </label>
                            <input type="number" id="orange" disabled value="<?php echo $perso['ORANGE'] ?>" autocomplete="off" class="form-control" name="orange">
                          </div>
                          <div class="form-group col-5">
                            <label>Numéro Personnel 2 :  </label>
                            <input type="number" id="mtn" disabled value="<?php echo $perso['MTN'] ?>" autocomplete="off" class="form-control" name="mtn">
                          </div>
                          <div class="form-group col-5">
                            <label>Numero professionnel :  </label>
                            <input type="number" id="num_pro" disabled value="<?php echo $perso['PHONE_PRO'] ?>" autocomplete="off" class="form-control" name="num_pro">
                          </div>
                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Personne a contacter en cas d'urgence</em>
                          </div>
                          <div class="form-group col-5">
                            <label>Numero d'urgence :  </label>
                            <input type="text" disabled value="<?php echo $perso['CONTACT_URGENT'] ?>" id="num_urgence" autocomplete="off" class="form-control" name="num_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Nom du concerné :  </label>
                            <input type="text" disabled value="<?php echo $perso['NOM_URGENT'] ?>" id="nom_urgence" autocomplete="off" class="form-control" name="nom_urgence">
                          </div>
                          <div class="form-group col-5">
                            <label>Nature du lien Avec le concerne :  </label>
                            <input type="text" disabled value="<?php echo $perso['LIEN_PARENTER'] ?>" id="lien" placeholder="Ex:Mon frere" autocomplete="off" class="form-control" name="lien">
                          </div>

                          <div class="col-12">
                            <em style="color:#000;font-size:20px;text-decoration:underline">Informations Complementaires</em>
                          </div>
                          <div class="form-group col-5">
                            <label>Pointure Chaussure :  </label>
                            <input type="text" disabled value="<?php echo $perso['POINTURE'] ?>" id="pointure" autocomplete="off" class="form-control" name="pointure">
                          </div>

                          <div class="form-group col-5">
                            <label>Francais :  </label>
                            <input type="text" disabled value="<?php echo $perso['FRANCAIS'] ?>" id="langue" autocomplete="off" class="form-control" name="langue">
                          </div>
                          <div class="form-group col-5">
                            <label>Anglais :  </label>
                            <input type="text" disabled value="<?php echo $perso['ANGLAIS'] ?>" id="langue" autocomplete="off" class="form-control" name="langue">
                          </div>

                          <div class="form-group col-5">
                            <label>Autre Langue ? : </label>
                            <input type="text" disabled value="<?php echo $perso['AUTRE_LANGUE'] ?>" id="langue" autocomplete="off" class="form-control" name="langue">
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
